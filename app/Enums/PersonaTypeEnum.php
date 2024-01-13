<?php

namespace App\Enums;

use App\Enums\Traits\EnumToArrayTrait;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum PersonaTypeEnum: string implements HasColor, HasLabel
{
    use EnumToArrayTrait;

    case NATURAL = 'NAT';
    case JURIDICA = 'JUR';

    public function getLabel(): ?string
    {
        return $this->translate();
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::NATURAL => 'info',
            self::JURIDICA => 'success',
        };
    }

    public function translate(): string
    {
        return match ($this) {
            self::NATURAL => 'Natural',
            self::JURIDICA => 'Jurídica',
        };
    }
}
