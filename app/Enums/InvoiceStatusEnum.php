<?php

namespace App\Enums;

use App\Enums\Traits\EnumToArrayTrait;
use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum InvoiceStatusEnum: string implements HasColor, HasLabel
{
    use EnumToArrayTrait;

    case UNSENT = 'UNSENT';
    case CREATED = 'CREATED';
    case CONVERTED_TO_INVOICE = 'CONVERTED_TO_INVOICE';
    case PROVISIONED = 'PROVISIONED';
    case INVOICED = 'INVOICED';
    case AUTHORIZED = 'AUTHORIZED';
    case ANNULLED = 'ANNULLED';
    case DELETED = 'DELETED';

    public static function getAllFiltersToSearchInGeneral(): array
    {
        return [
            self::CREATED->value => self::CREATED->value,
            self::CONVERTED_TO_INVOICE->value => self::CONVERTED_TO_INVOICE->value,
            self::PROVISIONED->value => self::PROVISIONED->value,
            self::INVOICED->value => self::INVOICED->value,
            self::AUTHORIZED->value => self::AUTHORIZED->value,
            self::ANNULLED->value => self::ANNULLED->value,
            self::DELETED->value => self::DELETED->value,
        ];
    }

    public static function getAllFiltersToSearchProforma(): array
    {
        return [
            self::CREATED->value => self::CREATED->value,
            self::CONVERTED_TO_INVOICE->value => self::CONVERTED_TO_INVOICE->value,
        ];
    }

    public static function getAllFiltersToSearchInvoice(): array
    {
        return [
            self::CREATED->value => self::CREATED->translate(),
            self::CONVERTED_TO_INVOICE->value => self::CONVERTED_TO_INVOICE->translate(),
            self::INVOICED->value => self::INVOICED->translate(),
            self::AUTHORIZED->value => self::AUTHORIZED->translate(),
            self::ANNULLED->value => self::ANNULLED->translate(),
        ];
    }

    public static function getAllFiltersToSearchSaleNote(): array
    {
        return [
            self::CREATED->value => self::CREATED->translate(),
            self::INVOICED->value => self::INVOICED->translate(),
            self::ANNULLED->value => self::ANNULLED->translate(),
        ];
    }

    public static function getAllFiltersToSearchCreditNote(): array
    {
        return [
            self::CREATED->value => self::CREATED->translate(),
            self::INVOICED->value => self::INVOICED->translate(),
            self::ANNULLED->value => self::ANNULLED->translate(),
        ];
    }

    public static function getAllFiltersToSearchDebitNote(): array
    {
        return [
            self::CREATED->value => self::CREATED->translate(),
            self::INVOICED->value => self::INVOICED->translate(),
            self::ANNULLED->value => self::ANNULLED->translate(),
        ];
    }

    public static function getAllFiltersToSearchOrder(): array
    {
        return [
            self::CREATED->value => self::CREATED->value,
            self::CONVERTED_TO_INVOICE->value => self::CONVERTED_TO_INVOICE->value,
        ];
    }

    public static function getAllFiltersToSearchWaybill(): array
    {
        return [
            self::CREATED->value => self::CREATED->translate(),
            //self::PROVISIONED->value => self::PROVISIONED->translate(),
            self::AUTHORIZED->value => self::AUTHORIZED->translate(),
            self::ANNULLED->value => self::ANNULLED->translate(),
        ];
    }

    public function getLabel(): ?string
    {
        return $this->translate();
    }

    public function getColor(): array|string|null
    {
        return match ($this) {
            self::UNSENT => Color::Gray,
            self::CREATED => Color::Sky,
            self::CONVERTED_TO_INVOICE => Color::Lime,
            self::PROVISIONED => Color::Amber,
            self::INVOICED => Color::Indigo,
            self::AUTHORIZED => Color::Emerald,
            self::ANNULLED => Color::Red,
            self::DELETED => Color::Rose,
        };
    }

    public function translate(): string
    {
        return match ($this) {
            self::CREATED => __('Created'),
            self::UNSENT => __('Unsent'),
            self::PROVISIONED => __('Provisioned'),
            self::INVOICED => __('Invoiced'),
            self::ANNULLED => __('Annulled'),
            self::AUTHORIZED => __('Authorized'),
            self::DELETED => __('Deleted'),
            self::CONVERTED_TO_INVOICE => __('Converted To Invoice'),
        };
    }

    public function explanation(): string
    {
        return match ($this) {
            self::CREATED => 'Documento creado',
            self::PROVISIONED => 'Documento configurado con un establecimiento y punto de emisión, a la espera de enviarlo al SRI',
            self::INVOICED => 'Documento facturado, en estado de AUTORIZADO en el SRI y sin pagos realizados',
            self::UNSENT => 'Documento enviado por email',
            self::ANNULLED => 'Documento anulado (verificar estado real en el SRI)',
            self::AUTHORIZED => 'Documento autorizado',
            self::DELETED => 'Documento eliminado',
            self::CONVERTED_TO_INVOICE => 'Documento convertido a factura',
        };
    }
}
