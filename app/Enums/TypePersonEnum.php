<?php

namespace App\Enums;

use App\Enums\Traits\EnumToArrayTrait;
use Filament\Support\Contracts\HasLabel;

enum TypePersonEnum: string implements HasLabel
{
    use EnumToArrayTrait;

    case REGULAR_CUSTOMERS = 'REGULAR_CUSTOMERS';
    case NEW_CUSTOMERS = 'NEW_CUSTOMERS';
    case INDIVIDUAL_CUSTOMERS = 'INDIVIDUAL_CUSTOMERS';
    case CORPORATE_CUSTOMERS = 'CORPORATE_CUSTOMERS';
    case SETTLED_ACCOUNTS_CUSTOMERS = 'SETTLED_ACCOUNTS_CUSTOMERS';
    case PREFERRED_CUSTOMERS = 'PREFERRED_CUSTOMERS';
    case CASH_CUSTOMERS = 'CASH_CUSTOMERS';
    case INACTIVE_CUSTOMERS = 'INACTIVE_CUSTOMERS';
    case DELINQUENT_CUSTOMERS = 'DELINQUENT_CUSTOMERS';

    public function getLabel(): ?string
    {
        return $this->translate();
    }

    public function translate(): string
    {
        return match ($this) {
            self::REGULAR_CUSTOMERS => __('Regular Customers'),
            self::NEW_CUSTOMERS => __('New Customers'),
            self::INDIVIDUAL_CUSTOMERS => __('Individual Customers'),
            self::CORPORATE_CUSTOMERS => __('Corporate Customers'),
            self::SETTLED_ACCOUNTS_CUSTOMERS => __('Settled Accounts Customers'),
            self::PREFERRED_CUSTOMERS => __('Preferred Customers'),
            self::CASH_CUSTOMERS => __('Cash Customers'),
            self::INACTIVE_CUSTOMERS => __('Inactive Customers'),
            self::DELINQUENT_CUSTOMERS => __('Delinquent Customers'),
        };
    }
}
