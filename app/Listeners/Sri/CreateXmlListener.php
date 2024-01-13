<?php

namespace App\Listeners\Sri;

use App\Services\Sri\XmlGenerateDocumentService;
use Exception;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class CreateXmlListener
{
    /**
     * Create the event listener.
     */
    public function __construct(public XmlGenerateDocumentService $xmlGenerateDocumentService)
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
        $event->xmlCreation = $this->xmlGenerateDocumentService->handle($event->electronicReceipt);

        $xml = json_decode($event->xmlCreation);

        throw_if(
            empty($xml->xml),
            new Exception('Error al crear XML', Response::HTTP_NOT_FOUND)
        );

        $pdf_path = $event->electronicReceipt->company->ruc.'/'.$event->electronicReceipt->sri_password_access.'.xml';

        $event->electronicReceipt->xml = $pdf_path;
        $event->electronicReceipt->save();

        Storage::disk('xmls_creados')->put($pdf_path, $xml->xml);
    }
}
