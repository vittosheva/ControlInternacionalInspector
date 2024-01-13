<?php

namespace App\Listeners\Sri;

use App\Enums\SriStatusEnum;
use App\Services\Sri\ValidateElectronicReceiptService;
use Exception;
use Illuminate\Support\Carbon;

class SendSignedXmlToSriListener
{
    /**
     * Create the event listener.
     */
    public function __construct(public ValidateElectronicReceiptService $validateElectronicReceiptService)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @throws Exception
     */
    public function handle($event): void
    {
        $event->xmlSentToSri = $this->validateElectronicReceiptService->handle(
            $event->electronicReceiptInInvoiceXml->environment->webserviceValidateUrl(),
            json_decode($event->xmlSigned)->xml,
        );

        $xmlSentToSri = json_decode($event->xmlSentToSri);

        $event->electronicReceipt->sri_schedule_sending_date = null;
        $event->electronicReceipt->sri_authorization_number = null;
        $event->electronicReceipt->save();

        if (! empty($xmlSentToSri->{'Fecha Procesamiento'})) {
            $sendDate = Carbon::parse($xmlSentToSri->{'Fecha Procesamiento'});
        }

        $event->electronicReceiptInInvoiceXml->attempts = $event->electronicReceiptInInvoiceXml->attempts + 1;
        $event->electronicReceiptInInvoiceXml->sri_send = 1;
        $event->electronicReceiptInInvoiceXml->sri_send_date = $sendDate ?? now();
        $event->electronicReceiptInInvoiceXml->sri_status = $xmlSentToSri->Estado ?? SriStatusEnum::SIN_PROCESAR;

        if (! empty($xmlSentToSri->Tipo) && $xmlSentToSri->Tipo === 'ERROR') {
            $event->electronicReceiptInInvoiceXml->sri_authorization_number = null;
            $event->electronicReceiptInInvoiceXml->sri_authorization_date = null;
            $event->electronicReceiptInInvoiceXml->sri_authorization_date_doc = null;
            $event->electronicReceiptInInvoiceXml->sri_error_message = $xmlSentToSri->Error ?? null;
            $event->electronicReceiptInInvoiceXml->sri_error_message_informacion_adicional = $xmlSentToSri->{'Información Adicional del SRI'} ?? null;
            $event->electronicReceiptInInvoiceXml->save();

            return;
        }

        $event->electronicReceiptInInvoiceXml->sri_error_message = null;
        $event->electronicReceiptInInvoiceXml->sri_error_message_informacion_adicional = null;
        $event->electronicReceiptInInvoiceXml->sri_authorization_date_doc = $sendDate ?? now();
        $event->electronicReceiptInInvoiceXml->save();
    }
}
