<?php

namespace App\Enums;

use App\Enums\Traits\EnumToArrayTrait;
use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum PaymentStatusEnum: string implements HasColor, HasLabel
{
    use EnumToArrayTrait;

    case PARTIALLY_PAID = 'Partially Paid';
    case PAID = 'Paid';
    case IN_FAVOR_OF_COMPANY = 'In Favor of Company';
    case IN_FAVOR_OF_CUSTOMER = 'In Favor of Customer';
    case IN_FAVOR_OF_VENDOR = 'In Favor of Vendor';

    public function getLabel(): ?string
    {
        return $this->translate();
    }

    public function getColor(): array|string|null
    {
        return match ($this) {
            self::PARTIALLY_PAID => Color::Yellow,
            self::PAID => Color::Green,
            self::IN_FAVOR_OF_COMPANY => Color::Sky,
            self::IN_FAVOR_OF_CUSTOMER => Color::Orange,
            self::IN_FAVOR_OF_VENDOR => Color::Indigo,
        };
    }

    public function explanation(): string
    {
        return match ($this) {
            self::PARTIALLY_PAID => 'Documento parcialmente pagado',
            self::PAID => 'Documento pagado',
            self::IN_FAVOR_OF_COMPANY => 'Documento con saldo a favor',
            self::IN_FAVOR_OF_CUSTOMER => 'Documento con saldo a favor del cliente',
            self::IN_FAVOR_OF_VENDOR => 'Documento con saldo a favor del proveedor',
        };
    }

    public function translate(): string
    {
        return match ($this) {
            self::PARTIALLY_PAID => __(self::PARTIALLY_PAID->value),
            self::PAID => __(self::PAID->value),
            self::IN_FAVOR_OF_COMPANY => __(self::IN_FAVOR_OF_COMPANY->value),
            self::IN_FAVOR_OF_CUSTOMER => __(self::IN_FAVOR_OF_CUSTOMER->value),
            self::IN_FAVOR_OF_VENDOR => __(self::IN_FAVOR_OF_VENDOR->value),
        };
    }
}
