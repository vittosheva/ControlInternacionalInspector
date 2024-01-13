<?php

namespace App\Enums;

use App\Enums\Traits\EnumToArrayTrait;
use Filament\Support\Contracts\HasLabel;

enum ChartOfAccountTypeEnum: string implements HasLabel
{
    use EnumToArrayTrait;

    case INCOME = 'Income';
    case EXPENSE = 'Expense';
    case ASSET = 'Asset';
    case LIABILITY = 'Liability';
    case EQUITY = 'Equity';

    public function getLabel(): ?string
    {
        return $this->translate();
    }

    public function translate(): string
    {
        return match ($this) {
            self::INCOME => __('Income'),
            self::EXPENSE => __('Expense'),
            self::ASSET => __('Asset'),
            self::LIABILITY => __('Liability'),
            self::EQUITY => __('Equity'),
        };
    }
}
