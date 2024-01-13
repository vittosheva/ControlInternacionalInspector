<?php

namespace App\Enums;

use App\Enums\Traits\EnumToArrayTrait;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum DocumentSourceTypeEnum: string implements HasColor, HasIcon, HasLabel
{
    use EnumToArrayTrait;

    case ISSUED = '1';
    case RECEIVED = '2';

    public function getLabel(): ?string
    {
        return $this->translate();
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::ISSUED => 'info',
            self::RECEIVED => 'warning',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::ISSUED => 'heroicon-m-bars-arrow-up',
            self::RECEIVED => 'heroicon-m-bars-arrow-down',
        };
    }

    public function translate(): string
    {
        return match ($this) {
            self::ISSUED => __('Issued'),
            self::RECEIVED => __('Received'),
        };
    }
}
