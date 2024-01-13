<?php

namespace App\Enums\Traits;

trait EnumToArrayTrait
{
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function array(): array
    {
        return array_combine(
            self::values(),
            self::names(),
        );
    }

    public static function arrayTranslateWithKeys(?string $method = null): array
    {
        $collection = collect($method !== null ? self::$method() : self::values());

        return array_combine(
            $collection->map(fn ($key) => static::tryFrom($key)->value)->toArray(),
            $collection->map(fn ($key) => static::tryFrom($key)->translate())->toArray()
        );
    }

    public static function onlyElectronicsArrayTranslateWithKeys(): array
    {
        // @phpstan-ignore-next-line
        $onlyElectronics = static::onlyElectronics();

        $collection = collect($onlyElectronics);

        return array_combine(
            $collection->map(fn ($key) => static::tryFrom($key)->value)->toArray(),
            $collection->map(fn ($key) => static::tryFrom($key)->translate())->toArray()
        );
    }

    public static function arrayTranslate(): array
    {
        return array_combine(
            self::values(),
            collect(self::values())->map(fn ($key) => static::tryFrom($key)->translate())->toArray()
        );
    }
}
