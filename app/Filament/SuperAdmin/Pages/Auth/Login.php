<?php

namespace App\Filament\SuperAdmin\Pages\Auth;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\Login as LoginBase;
use Livewire\Component;
use Phpsa\FilamentPasswordReveal\Password;

class Login extends LoginBase
{
    public string $captcha = '';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->label(__('Email'))
                    ->email()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Component $livewire, TextInput $component) => $livewire->validateOnly($component->getStatePath()))
                    ->prefixIcon('heroicon-o-envelope')
                    ->autofocus()
                    ->autocomplete('new-password')
                    ->required(),
                Password::make('password')
                    ->autocomplete('new-password')
                    ->generatable(false)
                    ->required(),
            ]);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'email' => $data['email'],
            'password' => $data['password'],
            'is_allowed_to_login' => 1,
            'is_active' => 1,
            'is_super' => 1,
            'deleted_at' => null,
        ];
    }
}
