<?php

namespace App\Enums;

use App\Enums\Traits\EnumToArrayTrait;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum DocumentTypeCodeEnum: string implements HasColor, HasIcon, HasLabel
{
    use EnumToArrayTrait;

    case PURCHASE = '1';
    case SALE = '2';

    public function getLabel(): ?string
    {
        return $this->translate();
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::PURCHASE => 'danger',
            self::SALE => 'success',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::PURCHASE => 'heroicon-m-arrow-trending-down',
            self::SALE => 'heroicon-m-arrow-trending-up',
        };
    }

    public function translate(): string
    {
        return match ($this) {
            self::PURCHASE => __('Purchase'),
            self::SALE => __('Sale'),
        };
    }
}
