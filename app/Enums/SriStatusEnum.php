<?php

namespace App\Enums;

use App\Enums\Traits\EnumToArrayTrait;
use Exception;
use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use ReflectionClass;

enum SriStatusEnum: string implements HasColor, HasIcon, HasLabel
{
    use EnumToArrayTrait;

    case RECIBIDA = 'RECIBIDA';
    case DEVUELTA = 'DEVUELTA';
    case EN_PROCESO = 'EN PROCESO';
    case NO_AUTORIZADO = 'NO AUTORIZADO';
    case WEBSERVICE_ERROR = 'ERROR WEBSERVICE';
    case AUTORIZADO = 'AUTORIZADO';
    case ANULADO = 'ANULADO';
    case ELIMINADO = 'ELIMINADO';
    case SIN_PROCESAR = 'SIN PROCESAR';

    public static function getAllInArray(): array
    {
        $reflectionClass = new ReflectionClass(self::class);
        $constants = $reflectionClass->getConstants();

        $cases = [];

        foreach ($constants as $key => $value) {
            if ($key == self::NO_AUTORIZADO->name) {
                $cases['NO AUTORIZADO'] = $value->value;
            } elseif ($key == self::WEBSERVICE_ERROR->name) {
                $cases['ERROR WEBSERVICE'] = $value->value;
            } else {
                $cases[$key] = $value->value;
            }
        }

        return $cases;
    }

    public static function getAllValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function getLabel(): ?string
    {
        return $this->translate();
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::RECIBIDA => Color::Gray,
            self::DEVUELTA => Color::Amber,
            self::EN_PROCESO => Color::Blue,
            self::NO_AUTORIZADO => Color::Neutral,
            self::WEBSERVICE_ERROR => Color::Rose,
            self::AUTORIZADO => Color::Emerald,
            self::ANULADO => Color::Yellow,
            self::ELIMINADO => Color::Red,
            self::SIN_PROCESAR => Color::Cyan,
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::RECIBIDA => 'lucide-check',
            self::DEVUELTA => 'lucide-undo-2',
            self::EN_PROCESO => 'lucide-disc',
            self::NO_AUTORIZADO => 'lucide-shield-off',
            self::WEBSERVICE_ERROR => 'lucide-shield-alert',
            self::AUTORIZADO => 'lucide-shield-check',
            self::ANULADO => 'lucide-x-circle',
            self::ELIMINADO => 'lucide-trash-2',
            self::SIN_PROCESAR => 'lucide-minus-circle',
        };
    }

    /**
     * @throws Exception
     */
    public function color(): string
    {
        return match ($this) {
            self::RECIBIDA => 'text-sky-800 border border-sky-300 bg-sky-200 hover:bg-sky-300 hover:text-sky-900 transition-all duration-300',
            self::DEVUELTA => 'text-yellow-800 border border-yellow-300 bg-yellow-200 hover:bg-yellow-300 hover:text-yellow-900 transition-all duration-300',
            self::EN_PROCESO => 'text-orange-800 border border-orange-300 bg-orange-200 hover:bg-orange-300 hover:text-orange-900 transition-all duration-300',
            self::AUTORIZADO => 'text-green-800 border border-green-300 bg-green-200 hover:bg-green-300 hover:text-green-900 transition-all duration-300',
            self::NO_AUTORIZADO, self::WEBSERVICE_ERROR, self::ELIMINADO => 'text-red-800 border border-red-300 bg-red-200 hover:bg-red-300 hover:text-red-900 transition-all duration-300',
            self::ANULADO => 'text-indigo-800 border border-indigo-300 bg-indigo-200 hover:bg-indigo-300 hover:text-indigo-900 transition-all duration-300',
            self::SIN_PROCESAR => 'text-gray-800 border border-gray-300 bg-gray-200 hover:bg-gray-300 hover:text-gray-900 transition-all duration-300',
        };
    }

    public function explanation(): string
    {
        return match ($this) {
            self::RECIBIDA => 'Documento recibido',
            self::DEVUELTA => 'Documento devuelto por el SRI',
            self::EN_PROCESO => 'Documento en procesamiento',
            self::AUTORIZADO => 'Documento autorizado',
            self::NO_AUTORIZADO => 'Documento no autorizado',
            self::ANULADO => 'Documento anulado',
            self::WEBSERVICE_ERROR => 'El webservice del SRI tiene problemas',
            self::ELIMINADO => 'Documento eliminado',
            self::SIN_PROCESAR => 'Documento sin procesar',
        };
    }

    public function translate(): string
    {
        return match ($this) {
            self::RECIBIDA => __(self::RECIBIDA->value),
            self::DEVUELTA => __(self::DEVUELTA->value),
            self::EN_PROCESO => __(self::EN_PROCESO->value),
            self::AUTORIZADO => __(self::AUTORIZADO->value),
            self::NO_AUTORIZADO => __(self::NO_AUTORIZADO->value),
            self::ANULADO => __(self::ANULADO->value),
            self::WEBSERVICE_ERROR => __(self::WEBSERVICE_ERROR->value),
            self::ELIMINADO => __(self::ELIMINADO->value),
            self::SIN_PROCESAR => __(self::SIN_PROCESAR->value),
        };
    }
}
