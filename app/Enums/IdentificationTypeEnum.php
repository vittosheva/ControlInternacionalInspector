<?php

namespace App\Enums;

use App\Enums\Traits\EnumToArrayTrait;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum IdentificationTypeEnum: string implements HasColor, HasLabel
{
    use EnumToArrayTrait;

    case RUC = '04';
    case CEDULA = '05';
    case PASAPORTE = '06';
    case FINAL = '07';
    case EXTERIOR = '08';

    public function getLabel(): ?string
    {
        return $this->translate();
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::RUC => 'info',
            self::CEDULA => 'success',
            self::PASAPORTE => 'warning',
            self::FINAL => 'blue',
            self::EXTERIOR => 'danger',
        };
    }

    public function translate(): string
    {
        return match ($this) {
            self::RUC => 'RUC',
            self::CEDULA => 'Cédula',
            self::PASAPORTE => 'Pasaporte',
            self::FINAL => 'Consumidor final',
            self::EXTERIOR => 'Identificación del exterior',
        };
    }
}
