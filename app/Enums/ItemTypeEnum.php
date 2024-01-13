<?php

namespace App\Enums;

use App\Enums\Traits\EnumToArrayTrait;
use Filament\Support\Contracts\HasLabel;

enum ItemTypeEnum: string implements HasLabel
{
    use EnumToArrayTrait;

    case GOOD = 'good';
    case SERVICE = 'service';

    public function getLabel(): ?string
    {
        return $this->translate();
    }

    public function translate(): string
    {
        return match ($this) {
            self::GOOD => __('Good'),
            self::SERVICE => __('Service'),
        };
    }
}
