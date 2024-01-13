<?php

namespace App\Listeners\Sri;

use App\Services\Sri\XmlSignDocumentService;
use Exception;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class SignXmlListener
{
    /**
     * Create the event listener.
     */
    public function __construct(public XmlSignDocumentService $xmlSignDocumentService)
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
        $event->xmlSigned = $this->xmlSignDocumentService->handle($event->electronicReceipt, $event->xmlCreation);

        $xml = json_decode($event->xmlSigned);

        throw_if(
            empty($xml->xml),
            new Exception('Error al firmar XML', Response::HTTP_NOT_FOUND)
        );

        $pdf_path = $event->electronicReceipt->company->ruc.'/'.$event->electronicReceipt->sri_password_access.'.xml';

        $event->electronicReceipt->xml = $pdf_path;
        $event->electronicReceipt->save();

        Storage::disk('xmls_firmados')->put($pdf_path, $xml->xml);
    }
}
