<?php

namespace App\Tables\Actions;

use App\Packages\Filament\SendEmailTrait;
use Filament\Actions\Action;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\IconSize;

class SendEmailTableAction extends Action
{
    use SendEmailTrait;

    public static function getDefaultName(): ?string
    {
        return 'sendEmailTable';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Send Email'))
            ->icon('lucide-mail')
            ->iconSize(IconSize::Small)
            ->color(Color::Slate)
            ->tooltip(__('Send Email'))
            ->extraAttributes(['class' => 'hide-text'])
            ->form([
                $this->emailForm(),
            ])
            ->disabled(fn ($record) => blank($record->pdf) && blank($record->xml))
            ->action(fn (array $data, $record) => $this->processEmail($data, $record));
    }
}
