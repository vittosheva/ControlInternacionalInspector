<?php

namespace App\Listeners\Sri;

use App\Enums\DocumentSourceTypeEnum;
use App\Enums\SriStatusEnum;
use App\Models\Document\InvoiceXml;
use Exception;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;
use SimpleXMLElement;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class StoreXmlInInvoiceXmlTableListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @throws Throwable
     */
    public function handle($event): void
    {
        $electronicReceiptInInvoiceXml = InvoiceXml::query()
            ->where('invoice_id', '=', $event->electronicReceipt->id)
            ->first();

        /*throw_if(
            empty($electronicReceiptInInvoiceXml->sri_password_access),
            new Exception('Comprobante no tiene clave de acceso.', Response::HTTP_NOT_FOUND)
        );*/

        $attempts = ($electronicReceiptInInvoiceXml->attempts ?? 0) + 1;

        if (! empty($electronicReceiptInInvoiceXml->attempts)) {
            if ($attempts >= 3) {
                Notification::make()
                    ->title('Máximos intentos permitidos')
                    ->body(new HtmlString('Ha superado el limite diario permitido para un comprobante no autorizado (3 intentos).<br><strong>Recomendación:</strong> Corrija los errores y vuelva a intentarlo mañana.<br><strong>Clave de acceso:</strong> '.$electronicReceiptInInvoiceXml->sri_password_access))
                    ->danger()
                    ->color('danger')
                    ->sendToDatabase($event->electronicReceipt->editor()->first());

                throw_if(
                    true,
                    new Exception('Ha superado el limite diario permitido para un comprobante no autorizado (3 intentos)', Response::HTTP_NOT_FOUND)
                );
            }

            $electronicReceiptInInvoiceXml->attempts = $attempts;
            $electronicReceiptInInvoiceXml->save();

            Notification::make()
                ->title('Intentos permitidos')
                ->body(new HtmlString("Intento para comprobante no autorizado ($attempts intentos).<br><strong>Clave de acceso:</strong> ".$electronicReceiptInInvoiceXml->sri_password_access))
                ->warning()
                ->color('warning')
                ->sendToDatabase($event->electronicReceipt->editor()->first());
        }

        $comprobante = null;

        if (
            ! empty($electronicReceiptInInvoiceXml->xml) &&
            $electronicReceiptInInvoiceXml->getAttributeValue('sri_status') === SriStatusEnum::AUTORIZADO &&
            Storage::disk('xmls_autorizados')->exists($electronicReceiptInInvoiceXml->xml)
        ) {
            $xml = Storage::disk('xmls_autorizados')->get($event->electronicReceipt->xml);
            $extractXmlInfo = simplexml_load_string($xml);
            $comprobante = new SimpleXMLElement($extractXmlInfo->Comprobante);
        } elseif ($xml = Storage::disk('xmls_firmados')->get($event->electronicReceipt->xml)) {
            $comprobante = simplexml_load_string($xml);
        } elseif ($xml = Storage::disk('xmls_creados')->get($event->electronicReceipt->xml)) {
            $comprobante = simplexml_load_string($xml);
        }

        $persona = $event->electronicReceipt->document_code->referenceToPersona();

        // Store content in invoice_xmls table
        $event->electronicReceiptInInvoiceXml = $this->storeInDb(
            $comprobante,
            $event->electronicReceipt,
            $event->electronicReceipt->$persona,
            $electronicReceiptInInvoiceXml
        );
    }

    /**
     * @throws Throwable
     */
    protected function storeInDb($comprobante, $electronicReceipt, $persona, $invoiceXml): InvoiceXml
    {
        return DB::transaction(function () use ($comprobante, $electronicReceipt, $persona, $invoiceXml) {
            $find = [
                'invoice_id' => $electronicReceipt->id,
                'document_code' => (string) $comprobante->infoTributaria->codDoc,
                'document_type_code' => $electronicReceipt->document_type_code,
            ];

            $content = [
                'parent_invoice_id' => $electronicReceipt->invoice_id,
                'document_number' => $comprobante->infoTributaria->estab.'-'.$comprobante->infoTributaria->ptoEmi.'-'.$comprobante->infoTributaria->secuencial,
                'source_type_code' => DocumentSourceTypeEnum::ISSUED,
                'environment' => $electronicReceipt->company->environment_id,
                'issue_date' => $electronicReceipt->issue_date,
                'persona_model' => $electronicReceipt->persona_model,
                'persona_id' => $persona->id ?? $electronicReceipt->persona_id,
                'persona_identification_number' => $persona->identification_number,
                'persona_business_name' => $persona->business_name,
                'persona_email' => $persona->email,
                'persona_address' => $persona->address,
                'establishment' => (string) $comprobante->infoTributaria->estab,
                'emission_point' => (string) $comprobante->infoTributaria->ptoEmi,
                'sequential' => (string) $comprobante->infoTributaria->secuencial,
                'subtotal' => $electronicReceipt->subtotal ?? zeros(),
                'subtotal_12' => $electronicReceipt->subtotal_12 ?? zeros(),
                'subtotal_0' => $electronicReceipt->subtotal_0 ?? zeros(),
                'subtotal_excento_iva' => $electronicReceipt->subtotal_excento_iva ?? zeros(),
                'subtotal_no_objeto_impuesto' => $electronicReceipt->subtotal_no_objeto_impuesto ?? zeros(),
                'tax' => $electronicReceipt->tax ?? zeros(),
                'base_imponible' => $electronicReceipt->base_imponible ?? zeros(),
                'total' => $electronicReceipt->total ?? zeros(),
                'xml_content' => (! empty($invoiceXml->sri_status) && $invoiceXml->sri_status === SriStatusEnum::AUTORIZADO) ? $electronicReceipt->xml : null,
                'xml' => (! empty($invoiceXml->sri_status) && $invoiceXml->sri_status === SriStatusEnum::AUTORIZADO) ? $electronicReceipt->xml : null,
                'pdf' => (! empty($invoiceXml->sri_status) && $invoiceXml->sri_status === SriStatusEnum::AUTORIZADO) ? $electronicReceipt->pdf : null,
                'qrcode' => $electronicReceipt->qrcode ?? null,
                'sri_signed_date' => $invoiceXml->sri_signed_date ?? null,
                'sri_send' => $invoiceXml->sri_send ?? null,
                'sri_send_date' => $invoiceXml->sri_send_date ?? null,
                'sri_password_access' => $invoiceXml->sri_password_access ?? $electronicReceipt->sri_password_access,
                'sri_authorization_number' => $invoiceXml->sri_authorization_number ?? null,
                'sri_authorization_date' => $invoiceXml->sri_authorization_date ?? null,
                'sri_authorization_date_doc' => $invoiceXml->sri_authorization_date_doc ?? null,
                'sri_error_message' => $invoiceXml->sri_error_message ?? null,
                'sri_error_message_informacion_adicional' => $invoiceXml->sri_error_message_informacion_adicional ?? null,
                'sri_status' => (! empty($invoiceXml->sri_status)) ? $invoiceXml->sri_status : SriStatusEnum::EN_PROCESO,
                'created_by' => $electronicReceipt->created_by,
                'created_at' => now(),
            ];

            return InvoiceXml::query()->updateOrCreate($find, $content);
        });
    }
}
