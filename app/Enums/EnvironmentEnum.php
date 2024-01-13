<?php

namespace App\Enums;

use App\Enums\Traits\EnumToArrayTrait;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum EnvironmentEnum: string implements HasColor, HasIcon, HasLabel
{
    use EnumToArrayTrait;

    case PRUEBAS = '1';
    case PRODUCCION = '2';

    public function getLabel(): ?string
    {
        return $this->translate();
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::PRUEBAS => 'danger',
            self::PRODUCCION => 'success',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::PRUEBAS => 'lucide-screen-share-off',
            self::PRODUCCION => 'lucide-screen-share',
        };
    }

    public function translate(): string
    {
        return match ($this) {
            self::PRUEBAS => __('Tests'),
            self::PRODUCCION => __('Production'),
        };
    }

    public function webserviceValidateUrl(): string
    {
        return match ($this) {
            self::PRUEBAS => config('dorsi.webservices_sri.validar_comprobante.pruebas'),
            self::PRODUCCION => config('dorsi.webservices_sri.validar_comprobante.produccion'),
        };
    }

    public function webserviceAuthorizeUrl(): string
    {
        return match ($this) {
            self::PRUEBAS => config('dorsi.webservices_sri.autorizar_comprobante.pruebas'),
            self::PRODUCCION => config('dorsi.webservices_sri.autorizar_comprobante.produccion'),
        };
    }
}
