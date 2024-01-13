<?php

use App\Enums\IdentificationTypeEnum;
use App\Enums\PersonaTypeEnum;
use App\Models\Tax\Tax;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

if (! function_exists('generateId')) {
    function generateId(string $id = '', int $length = 9): ?string
    {
        if (empty($id)) {
            $id = substr(base_convert(sha1(uniqid((string) mt_rand())), 16, 36), 0, $length);
        }

        return preg_replace('/[ _-]+/', '_', $id);
    }
}

if (! function_exists('generateName')) {
    function generateName(int $length = 9): string
    {
        $characters = 'abcdefghilkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}

if (! function_exists('sku')) {
    function sku($source = null, $separator = '-', $prefixLimit = 6, $signatureLimit = 8): string
    {
        $source = Str::of($source);
        $separator = $source->isNotEmpty() ? $separator : '';
        $studly = $source->studly();
        $source = Str::of($studly)->limit($prefixLimit, '');
        $signature = str_shuffle(str_repeat(str_pad('0123456789', 8, rand(0, 9).rand(0, 9), STR_PAD_LEFT), 2));
        $signature = substr($signature, 0, $signatureLimit);
        $result = implode($separator, [$source, $signature]);

        if (Str::of($result)->startsWith('0')) {
            return sku(null, $separator, $prefixLimit, $signatureLimit);
        }

        return Str::of($result)->upper();
    }
}

if (! function_exists('getDocPrefix')) {
    function getDocPrefix($modelClass = null): string
    {
        $model = Str::of($modelClass)->explode('\\')->last();
        $key = Str::of($model)->snake()->toString();

        return getDocPrefixes()[$key] ?? app($modelClass)::$prefixName ?? '';
    }
}

if (! function_exists('getDocPrefixes')) {
    function getDocPrefixes(): array
    {
        if (empty(filament()->getTenant()) || empty(filament()->getTenant()->getAttributeValue('ruc'))) {
            return [];
        }

        return Cache::get('document_prefixes_'.filament()->getTenant()->getAttributeValue('ruc')) ?? [];
    }
}

if (! function_exists('idNumberFormat')) {
    function idNumberFormat($number = 0, ?string $prefixName = null, bool $withPrefix = true, ?string $addSymbol = null): string
    {
        $number = Str::of($number)->padLeft(padLeftCompletion(), '0');

        if (! $withPrefix) {
            return $number;
        }

        return $prefixName.$addSymbol.$number;
    }
}

if (! function_exists('numberFormat')) {
    function numberFormat($number, $decimals = null): string
    {
        if (empty($decimals)) {
            $decimals = config('dorsi.decimals_global');
        }

        return bcadd($number, '0', $decimals);
    }
}

if (! function_exists('moneyFormat')) {
    function moneyFormat($number, $decimals = null, ?string $prefix = '$', bool $withPrefix = true): string
    {
        if (empty($decimals)) {
            $decimals = config('dorsi.decimals_global');
        }

        //$number = Str::of(number_format($number, $decimals));
        $number = Str::of(bcdiv($number, '1', $decimals));

        if (! $withPrefix) {
            return $number->toString();
        }

        return $number->prepend($prefix)->toString();
    }
}

if (! function_exists('padLeftCompletion')) {
    function padLeftCompletion()
    {
        return config('dorsi.padLeft', 9);
    }
}

if (! function_exists('generatePvpPrice')) {
    function generatePvpPrice($componentName, $set, $get, $prefix = '$', $withPrefix = false): string
    {
        $price_1 = $get('price_1');

        if (! in_array($componentName, ['price_1', 'pvp_price', 'tax_iva_id', 'tax_ice_id']) || blank($get('tax_iva_id'))) {
            return $set('pvp_price', moneyFormat($price_1, prefix: $prefix, withPrefix: $withPrefix));
        }

        $tax = Tax::where('id', '=', $get('tax_iva_id'))->value('rate') ?? 0;

        if ($tax == 0) {
            $set('visual_pvp_price', moneyFormat($price_1, prefix: $prefix, withPrefix: $withPrefix));

            return $set('pvp_price', moneyFormat($price_1, prefix: $prefix, withPrefix: $withPrefix));
        }

        $total = (($price_1 * $tax) / 100) + $price_1;

        $set('visual_pvp_price', moneyFormat($total, prefix: $prefix, withPrefix: $withPrefix));

        return $set('pvp_price', moneyFormat($total, prefix: $prefix, withPrefix: $withPrefix));
    }
}

if (! function_exists('prefixFormat')) {
    function prefixFormat(string $prefixName, bool $addDash = false): string
    {
        if (! $addDash) {
            return $prefixName;
        }

        return $prefixName.'-';
    }
}

if (! function_exists('minutesToHours')) {
    function minutesToHours($minutes = null, bool $round = false): int
    {
        $now = now();
        $now2 = clone $now;

        if ($round) {
            return $now2->addMinutes($minutes)->diffAsCarbonInterval($now)->roundHours()->hours;
        }

        return $now2->addMinutes($minutes)->diffInHours($now);
    }
}

if (! function_exists('hoursToMinutes')) {
    function hoursToMinutes($hours = null): int
    {
        $now = now();
        $now2 = clone $now;

        return $now->addHours($hours)->diffInMinutes($now2);
    }
}

if (! function_exists('personaGenerationHelper')) {
    function personaGenerationHelper(): stdClass
    {
        $fake = fake('es_ES');

        $personaType = $fake->randomElement(PersonaTypeEnum::values());
        $identificationType = $fake->randomElement(array_diff(IdentificationTypeEnum::values(), ['07']));

        $identificationNumber = match ($identificationType) {
            '04' => $fake->numerify('##########').'001',
            '05' => $fake->numerify('##########'),
            default => $fake->numerify('########'),
        };

        $businessName = match ($identificationType) {
            '04' => $fake->name,
            default => $fake->company,
        };

        $companyId = filament()->getTenant()->getAttributeValue('id');

        return (object) [
            'fake' => $fake,
            'companyId' => $companyId,
            'personaType' => $personaType,
            'identificationType' => $identificationType,
            'identificationNumber' => $identificationNumber,
            'businessName' => $businessName,
            'name' => $fake->name(),
            'password' => bcrypt('password7_'),
        ];
    }
}

if (! function_exists('emission')) {
    function emission(): string
    {
        return 'Normal';
    }
}

if (! function_exists('emissionType')) {
    function emissionType(): string
    {
        return '1';
    }
}

if (! function_exists('isValidXML')) {
    function isValidXML(string $xml = ''): bool
    {
        return (bool) @simplexml_load_string($xml);
    }
}

if (! function_exists('urlToken')) {
    function urlToken(?string $format = null): string
    {
        if ($format === 'base58') {
            Str::ulid()->toBase58();
        }

        if ($format === 'rfc4122') {
            Str::ulid()->toRfc4122();
        }

        return Str::ulid();
    }
}

if (! function_exists('finalConsumerName')) {
    function finalConsumerName(): string
    {
        return 'Consumidor Final';
    }
}

if (! function_exists('finalConsumerNumber')) {
    function finalConsumerNumber(): string
    {
        return '9999999999999';
    }
}

if (! function_exists('finalIdentificationType')) {
    function finalIdentificationType(): string
    {
        return '07';
    }
}

if (! function_exists('zeros')) {
    function zeros(): string
    {
        return '0.00';
    }
}

if (! function_exists('getPanelNames')) {
    function getPanelNames(): array
    {
        $panels = [];

        foreach (config('dorsi.filament.modules.permissions') as $permission) {
            if (auth()->user()->can($permission)) {
                $panels[] = Str::of($permission)->camel()->remove('access')->lcfirst()->toString();
            }
        }

        return $panels;
    }
}

if (! function_exists('greeting')) {
    function greeting(): string
    {
        $hour = now()->format('H');

        if ($hour < 12) {
            return __('Good Morning');
        }

        if ($hour <= 17) {
            return __('Good Afternoon');
        }

        return __('Good Evening');
    }
}

if (! function_exists('sriAccessCode')) {
    /**
     * 1 Fecha de Emisión Numérico             ddmmaaaa        8
     * 2 Tipo de Comprobante                   (Tabla 3)       2
     * 3 Número de RUC                         1234567890001   13
     * 4 Tipo de Ambiente                      (Tabla 4)       1
     * 5 Serie                                 001001          6
     * 6 Número del Comprobante (secuencial)   000000001       9
     * 7 Código Numérico                       Numérico        8
     * 8 Tipo de Emisión                       (Tabla 2)       1
     * 9 Dígito Verificador (módulo 11)        Numérico        1
     * 19052023 09923012010011004001000012344343361561
     */
    function sriAccessCode(string $ruc, string $tipoAmbiente, Carbon|string $issue_date, string $tipoComprobante, string $establishment, string $emission_point, int $sequential): string
    {
        $fechaEmision = $issue_date instanceof Carbon ? $issue_date->format('dmY') : Carbon::parse($issue_date)->format('dmY');
        $serie = Str::replace('-', '', $establishment.$emission_point);
        $secuencial = Str::padLeft((string) $sequential, 9, '0');
        $codigoNumerico = sprintf('%08d', mt_rand(1, 99999999));
        $tipoEmision = emissionType();

        $prefix48Characters = $fechaEmision.$tipoComprobante.$ruc.$tipoAmbiente.$serie.$secuencial.$codigoNumerico.$tipoEmision;

        $verifyingDigit = mod11Dv($prefix48Characters);

        $sriAccessCode = $prefix48Characters.$verifyingDigit;

        if (strlen($sriAccessCode) != 49) {
            return sriAccessCode($ruc, $tipoAmbiente, $issue_date, $tipoComprobante, $establishment, $emission_point, $sequential);
        }

        return $sriAccessCode;
    }
}

if (! function_exists('mod11Dv')) {
    function mod11Dv($num): bool|int
    {
        $digits = str_replace(['.', ','], [''], strrev($num));

        if (! ctype_digit($digits)) {
            return false;
        }

        $sum = 0;
        $factor = 2;

        for ($i = 0; $i < strlen($digits); $i++) {
            $sum += substr($digits, $i, 1) * $factor;

            if ($factor == 7) {
                $factor = 2;
            } else {
                $factor++;
            }
        }

        $dv = 11 - ($sum % 11);

        if ($dv < 10) {
            return $dv;
        }

        if ($dv == 11) {
            return 0;
        }

        return $dv;
    }
}
