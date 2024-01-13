<?php

namespace App\Enums;

use App\Enums\Traits\EnumToArrayTrait;
use Filament\Support\Contracts\HasLabel;

enum WarehouseTransactionTypeEnum: string implements HasLabel
{
    use EnumToArrayTrait;

    case INCOMING = 'Incoming';
    case OUTGOING = 'Outgoing';
    case TRANSFER = 'Transfer';
    case ADJUSTMENT = 'Adjustment';
    case OTHER = 'Other';

    public function getLabel(): ?string
    {
        return $this->translate();
    }

    public function translate(): string
    {
        return match ($this) {
            self::INCOMING => __('Incoming'),
            self::OUTGOING => __('Outgoing'),
            self::TRANSFER => __('Transfer'),
            self::ADJUSTMENT => __('Adjustment'),
            self::OTHER => __('Other'),
        };
    }
}
