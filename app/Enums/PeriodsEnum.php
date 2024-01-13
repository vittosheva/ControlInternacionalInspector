<?php

namespace App\Enums;

use App\Enums\Traits\EnumToArrayTrait;
use Filament\Support\Contracts\HasLabel;

enum PeriodsEnum: string implements HasLabel
{
    use EnumToArrayTrait;

    case DAY = 'DAY';
    case WEEK = 'WEEK';
    case MONTH = 'MONTH';
    case YEAR = 'YEAR';

    public static function default(): self
    {
        return self::DAY;
    }

    public function getLabel(): ?string
    {
        return $this->translate();
    }

    public function translate(): string
    {
        return match ($this) {
            self::DAY => __('Day'),
            self::WEEK => __('Week'),
            self::MONTH => __('Month'),
            self::YEAR => __('Year'),
        };
    }
}
