<?php

namespace App\Filament\Main\Pages\Auth;

use App\Models\Core\Company;
use App\Models\Persona\User;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Filament\Facades\Filament;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Models\Contracts\FilamentUser;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use Phpsa\FilamentPasswordReveal\Password;

class Login extends BaseLogin
{
    public string $captcha = '';

    public bool $company_id = false;

    public function mount(): void
    {
        if (Filament::auth()->check()) {
            redirect()->intended(Filament::getUrl());
        }

        if (request()->url() !== Filament::getPanel()->getLoginUrl()) {
            redirect()->intended(Filament::getPanel()->getLoginUrl());
        }

        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->label(__('Email'))
                    ->email()
                    //->default('vittoriodormi83@gmail.com')
                    ->afterStateUpdated(fn (Component $livewire, TextInput $component) => $livewire->validateOnly($component->getStatePath()))
                    ->prefixIcon('heroicon-o-envelope')
                    ->autocomplete('new-password')
                    ->autofocus()
                    ->required(),
                Password::make('password')
                    //->default('Isa2108__')
                    ->hint(filament()->hasPasswordReset() ? new HtmlString(Blade::render('<x-filament::link :href="filament()->getRequestPasswordResetUrl()"> '.__('filament-panels::pages/auth/login.actions.request_password_reset.label').'</x-filament::link>')) : null)
                    ->autocomplete('new-password')
                    ->generatable(false)
                    ->required(),
                $this->getRememberFormComponent(),
                Select::make('company_id')
                    ->label(__('Companies'))
                    ->options(function (Get $get) {
                        if (! empty($get('email')) && ! empty($get('password')) && $this->company_id) {
                            return User::loginQuery([
                                'email' => $get('email'),
                            ])
                                ->pluck(Company::getModel()->qualifyColumn('name'), Company::getModel()->qualifyColumn('id'))
                                ->toArray();
                        }

                        return [];
                    })
                    ->required()
                    ->preload()
                    ->visible(fn (Get $get) => filament()->hasTenancy() && ! empty($get('email')) && ! empty($get('password')) && $this->company_id),
            ]);
    }

    public function authenticate(): ?LoginResponse
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            Notification::make()
                ->title(__('filament-panels::pages/auth/login.notifications.throttled.title', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]))
                ->body(array_key_exists('body', __('filament-panels::pages/auth/login.notifications.throttled') ?: []) ? __('filament-panels::pages/auth/login.notifications.throttled.body', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]) : null)
                ->danger()
                ->send();

            return null;
        }

        $data = $this->form->getState();

        // Company selection
        if (filament()->hasTenancy() && ! $this->company_id) {
            $this->company_id = User::loginQuery($this->getCredentialsFromFormData($data))->exists();

            if (! $this->company_id) {
                Notification::make()
                    ->title('Usuario no está activo o no tiene compañías activas')
                    ->danger()
                    ->send();
            }

            return null;
        }
        // Company selection

        $credentials = $this->getCredentialsFromFormData($data);

        if (filament()->hasTenancy()) {
            unset(
                $credentials['is_allowed_to_login'],
                $credentials['is_super'],
                $credentials['is_active'],
            );
        }

        if (! Filament::auth()->attempt($credentials, $data['remember'] ?? false)) {
            $this->throwFailureValidationException();
        }

        $user = Filament::auth()->user();

        // Set selected Tenant
        if (filament()->hasTenancy()) {
            Filament::setTenant(Company::find($data['company_id']));
        }

        if (
            ($user instanceof FilamentUser) &&
            (! $user->canAccessPanel(Filament::getCurrentPanel()))
        ) {
            Filament::auth()->logout();

            $this->throwFailureValidationException();
        }

        session()->regenerate();

        return app(LoginResponse::class);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'email' => $data['email'],
            'password' => $data['password'],
            'is_allowed_to_login' => 1,
            'is_active' => 1,
            'is_super' => 0,
            'deleted_at' => null,
        ];
    }
}
