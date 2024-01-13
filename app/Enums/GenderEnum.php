<?php

namespace App\Enums;

use App\Enums\Traits\EnumToArrayTrait;
use Filament\Support\Contracts\HasLabel;

enum GenderEnum: string implements HasLabel
{
    use EnumToArrayTrait;

    case MALE = 'M';
    case FEMALE = 'F';

    public function getLabel(): ?string
    {
        return $this->translate();
    }

    public function translate(): string
    {
        return match ($this) {
            self::MALE => __('Male'),
            self::FEMALE => __('Female'),
        };
    }
}
