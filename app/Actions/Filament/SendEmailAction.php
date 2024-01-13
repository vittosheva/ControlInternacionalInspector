<?php

namespace App\Actions\Filament;

use App\Packages\Filament\SendEmailTrait;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;

class SendEmailAction extends Action
{
    use SendEmailTrait;

    public static function getDefaultName(): ?string
    {
        return 'sendEmail';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Send Email'))
            ->icon('heroicon-s-paper-airplane')
            ->outlined(false)
            ->color(Color::Slate)
            ->form([
                $this->emailForm(),
            ])
            ->action(fn (array $data, $record) => $this->processEmail($data, $record))
            ->visible(fn () => auth()->user()->isAdmin());
    }
}
