<?php

namespace App\Enums;

use App\Enums\Traits\EnumToArrayTrait;
use Filament\Support\Contracts\HasLabel;

enum ChartOfAccountAccountTypeEnum: string implements HasLabel
{
    use EnumToArrayTrait;

    case T = 'T';
    case M = 'M';

    public function getLabel(): ?string
    {
        return $this->translate();
    }

    public function translate(): string
    {
        return match ($this) {
            self::T => __('Totals'),
            self::M => __('Movements'),
        };
    }

    public function borderColor(): string
    {
        return match ($this) {
            self::T => 'border-l-solid border-l-2 border-l-indigo-400',
            self::M => 'border-l-solid border-l-2',
        };
    }
}
