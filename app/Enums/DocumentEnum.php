<?php

namespace App\Enums;

use App\Enums\Traits\EnumToArrayTrait;
use App\Models\Document\CreditNote;
use App\Models\Document\DebitNote;
use App\Models\Document\Invoice;
use App\Models\Document\Proforma;
use App\Models\Document\PurchaseSettlement;
use App\Models\Document\SaleNote;
use App\Models\Document\Waybill;
use App\Models\Document\WithholdingVoucher;
use App\Services\Sri\DocumentFormats\InvoiceXmlBuild;
use Exception;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

enum DocumentEnum: string implements HasLabel
{
    use EnumToArrayTrait;

    case INVOICE = '01';
    case PURCHASE_SETTLEMENT = '03';
    case CREDIT_NOTE = '04';
    case DEBIT_NOTE = '05';
    case WAYBILL = '06';
    case WITHHOLDING_VOUCHER = '07';

    case SALE_NOTE = '02';
    case PROFORMA = 'PROF';
    case SALE_ORDER = 'ORD';
    case PURCHASE_ORDER = '92';

    public static function onlyElectronics(): array
    {
        return [
            self::INVOICE->value,
            self::PURCHASE_SETTLEMENT->value,
            self::CREDIT_NOTE->value,
            self::DEBIT_NOTE->value,
            self::WAYBILL->value,
            self::WITHHOLDING_VOUCHER->value,
        ];
    }

    public function getLabel(): ?string
    {
        return $this->translate();
    }

    public function name(): string
    {
        return match ($this) {
            self::INVOICE => 'invoice',
            self::PURCHASE_SETTLEMENT => 'custom_clearance',
            self::CREDIT_NOTE => 'credit_note',
            self::DEBIT_NOTE => 'debit_note',
            self::WAYBILL => 'waybill',
            self::WITHHOLDING_VOUCHER => 'withholding_voucher',
            self::PROFORMA => 'proforma',
            self::SALE_NOTE => 'sale_note',
            self::SALE_ORDER => 'sale_order',
            self::PURCHASE_ORDER => 'purchase_order',
        };
    }

    public function translate(): ?string
    {
        return (string) match ($this) {
            self::INVOICE => __('Invoice'),
            self::PURCHASE_SETTLEMENT => __('Purchase Settlement'),
            self::CREDIT_NOTE => __('Credit Note'),
            self::DEBIT_NOTE => __('Debit Note'),
            self::WAYBILL => __('Waybill'),
            self::WITHHOLDING_VOUCHER => __('Withholding Voucher'),
            self::PROFORMA => __('Proforma'),
            self::SALE_NOTE => __('Sale Note'),
            default => null,
        };
    }

    public function prefix(): ?string
    {
        return match ($this) {
            self::INVOICE => Invoice::$prefixName,
            self::PURCHASE_SETTLEMENT => PurchaseSettlement::$prefixName,
            self::CREDIT_NOTE => CreditNote::$prefixName,
            self::DEBIT_NOTE => DebitNote::$prefixName,
            self::WAYBILL => Waybill::$prefixName,
            self::WITHHOLDING_VOUCHER => WithholdingVoucher::$prefixName,
            self::PROFORMA => Proforma::$prefixName,
            self::SALE_NOTE => SaleNote::$prefixName,
            default => null,
        };
    }

    /**
     * @throws Exception
     */
    public function model(): ?Model
    {
        return match ($this) {
            self::INVOICE => new Invoice,
            self::PURCHASE_SETTLEMENT => new PurchaseSettlement,
            self::CREDIT_NOTE => new CreditNote,
            self::DEBIT_NOTE => new DebitNote,
            self::WAYBILL => new Waybill,
            self::WITHHOLDING_VOUCHER => new WithholdingVoucher,
            self::PROFORMA => new Proforma,
            self::SALE_NOTE => new SaleNote,
            default => throw new Exception('There is no model reference'),
        };
    }

    /**
     * @throws Exception
     */
    public function modelWithRelations(): ?Builder
    {
        return match ($this) {
            self::INVOICE,
            self::PROFORMA,
            self::SALE_NOTE,
            self::CREDIT_NOTE,
            self::DEBIT_NOTE,
            self::PURCHASE_SETTLEMENT => self::model()
                ->with([
                    'company:id,ruc,name,trade_name,email,logo,use_logo,telephone,address,environment_id,main_user_id' => [
                        'taxInformation:id,company_id,label,key,value,attributes',
                        'electronicSignature:id,company_id,signature_file,signature_password',
                    ],
                    'customer:id,business_name,identification_type,identification_number,email,address,telephone',
                    'document:id,name,code',
                    'invoiceItems:id,invoice_id,consecutive,item_id,main_code,name,description,quantity,price,discount_format,discount_value,discount_total,subtotal,base_imponible,ice_code,ice_rate,ice_total,iva_code,iva_rate,iva_total,total' => [
                        'item:id,item_id,unit_code' => [
                            'unit:id,code,name',
                        ],
                        'tax:id,code,name,rate,type,tax_type_code',
                    ],
                    'invoicePayments:id,invoice_id,consecutive,payment_method_id,total,payment_deadline,time_unit',
                ])
                ->select([
                    ...self::model()->getFillable(), 'id',
                ]),
            self::WAYBILL => self::model()
                ->with([
                    'company:id,ruc,name,trade_name,email,logo,use_logo,telephone,address,environment_id,main_user_id' => [
                        'taxInformation:id,company_id,label,key,value,attributes',
                        'electronicSignature:id,company_id,signature_file,signature_password',
                    ],
                    'customer:id,business_name,identification_type,identification_number,email,address,telephone',
                    'document:id,name,code',
                    'waybillItems:id,invoice_id,consecutive,item_id,internal_code,name,quantity' => [
                        'item:id,item_id,unit_code' => [
                            'unit:id,code,name',
                        ],
                    ],
                ])
                ->select([
                    ...self::model()->getFillable(), 'id',
                ]),
            default => throw new Exception('There is no model with relations reference'),
        };
    }

    public function isElectronic(): bool
    {
        return in_array($this->value, self::onlyElectronics());
    }

    public function isNotElectronic(): bool
    {
        return ! $this->isElectronic();
    }

    public function is(null|self|array $document): bool
    {
        if (is_array($document)) {
            return in_array($this, $document);
        }

        return $this === $document;
    }

    public function isInvoice(): bool
    {
        return $this == self::INVOICE;
    }

    public function isPurchaseSettlement(): bool
    {
        return $this == self::PURCHASE_SETTLEMENT;
    }

    public function isCreditNote(): bool
    {
        return $this == self::CREDIT_NOTE;
    }

    public function isDebitNote(): bool
    {
        return $this == self::DEBIT_NOTE;
    }

    public function isWaybill(): bool
    {
        return $this == self::WAYBILL;
    }

    public function isWithholdingVoucher(): bool
    {
        return $this == self::WITHHOLDING_VOUCHER;
    }

    public function fillingColumns(): array
    {
        return match ($this) {
            self::INVOICE => (new Invoice)->getModel()->getFillable(),
            self::PURCHASE_SETTLEMENT => (new PurchaseSettlement)->$this->getModel()->$this->getFillable(),
            self::CREDIT_NOTE => (new CreditNote)->getModel()->getFillable(),
            self::DEBIT_NOTE => (new DebitNote)->getModel()->getFillable(),
            self::WAYBILL => (new Waybill)->getModel()->getFillable(),
            self::WITHHOLDING_VOUCHER => (new WithholdingVoucher)->getModel()->getFillable(),
            self::PROFORMA => (new Proforma)->getModel()->getFillable(),
            self::SALE_NOTE => (new SaleNote)->getModel()->getFillable(),
            default => [],
        };
    }

    /**
     * @throws Exception
     */
    public function referenceToPersona(): string
    {
        return match ($this) {
            self::INVOICE,
            self::PURCHASE_SETTLEMENT,
            self::CREDIT_NOTE,
            self::DEBIT_NOTE,
            self::SALE_NOTE,
            self::PROFORMA,
            self::SALE_ORDER => 'customer',
            self::WAYBILL => 'carrier',
            self::WITHHOLDING_VOUCHER => 'vendor',
            default => throw new Exception('There is no persona reference'),
        };
    }

    /**
     * @throws Exception
     */
    public function referenceToXmlName(): ?string
    {
        return match ($this) {
            self::INVOICE => 'factura',
            self::PURCHASE_SETTLEMENT => 'liquidacionCompra',
            self::CREDIT_NOTE => 'notaCredito',
            self::DEBIT_NOTE => 'notaDebito',
            self::WAYBILL => 'guiaRemision',
            self::WITHHOLDING_VOUCHER => 'comprobanteRetencion',
            default => throw new Exception('There is no XML name reference'),
        };
    }

    /**
     * @throws Exception
     */
    public function referenceToXmlNode(): ?string
    {
        return match ($this) {
            self::INVOICE => 'infoFactura',
            self::PURCHASE_SETTLEMENT => 'infoLiquidacionCompra',
            self::CREDIT_NOTE => 'infoNotaCredito',
            self::DEBIT_NOTE => 'infoNotaDebito',
            self::WAYBILL => 'infoGuiaRemision',
            self::WITHHOLDING_VOUCHER => 'infoCompRetencion',
            default => throw new Exception('There is no XML node reference'),
        };
    }

    /**
     * @throws Exception
     */
    public function xmlCreation(): array|InvoiceXmlBuild
    {
        return match ($this) {
            self::INVOICE => new InvoiceXmlBuild(),
            self::PURCHASE_SETTLEMENT => [],
            self::CREDIT_NOTE => [],
            self::DEBIT_NOTE => [],
            self::WAYBILL => [],
            self::WITHHOLDING_VOUCHER => [],
            default => throw new Exception('There is no XML creation document'),
        };
    }

    public function sriDocumentVersion(): string
    {
        return match ($this) {
            self::INVOICE => '2.1.0',
            self::PURCHASE_SETTLEMENT => '1.1.0',
            self::CREDIT_NOTE => '1.1.0',
            self::DEBIT_NOTE => '1.1.0',
            self::WAYBILL => '1.1.0',
            self::WITHHOLDING_VOUCHER => '1.0.0',
            default => '1.1.0',
        };
    }

    public function version(): string
    {
        return match ($this) {
            self::INVOICE => '2.1.0',
            self::PURCHASE_SETTLEMENT => '1.1.0',
            self::CREDIT_NOTE => '1.1.0',
            self::DEBIT_NOTE => '1.0.0',
            self::WAYBILL => '1.1.0',
            self::WITHHOLDING_VOUCHER => '1.0.0',
            default => '1.0.0',
        };
    }

    /**
     * @throws Exception
     */
    public function printTemplate(): string
    {
        return match ($this) {
            self::INVOICE => 'invoice/invoice-1',
            self::PURCHASE_SETTLEMENT => 'purchase-settlement/purchase-settlement-1',
            self::CREDIT_NOTE => 'credit-note/credit-note-1',
            self::DEBIT_NOTE => 'debit-note/debit-note-1',
            self::WAYBILL => 'waybill/waybill-1',
            self::WITHHOLDING_VOUCHER => 'withholding-voucher/withholding-voucher-1',
            self::PROFORMA => 'proforma/proforma-1',
            self::SALE_NOTE => 'sale-note/sale-note-1',
            default => throw new Exception('There is no print template'),
        };
    }
}
