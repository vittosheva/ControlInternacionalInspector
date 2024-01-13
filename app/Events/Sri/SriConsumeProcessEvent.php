<?php

namespace App\Events\Sri;

use App\Enums\DocumentEnum;
use App\Enums\DocumentTypeCodeEnum;
use App\Enums\EnvironmentEnum;
use App\Models\Document\Document;
use Exception;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class SriConsumeProcessEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public ?Model $electronicReceipt;

    public ?Model $electronicReceiptInInvoiceXml;

    public string $voucherType;

    public string $electronicSignatureFile;

    public string $electronicSignaturePassword;

    public string $webserviceValidateUrl;

    public string $webserviceAuthorizeUrl;

    public string $xmlCreation;

    public string $xmlSigned;

    public string $xmlSentToSri;

    /**
     * Create a new event instance.
     *
     * @throws Throwable
     */
    public function __construct(
        public int $company_id,
        public int $invoice_id,
        public DocumentEnum $document_code,
        public DocumentTypeCodeEnum $document_type_code,
        public EnvironmentEnum $environment,
        public string $version,
    ) {
        throw_if(
            empty($this->company_id) || empty($this->invoice_id),
            new Exception('Faltan datos como compañía, ID de documento y/o tipo de documento.', Response::HTTP_NOT_FOUND)
        );

        throw_if(
            ! Document::modelNameExistsAndIsActive($this->document_code),
            new Exception('No existe el tipo de documento o está inactivo.', Response::HTTP_NOT_FOUND)
        );

        $this->electronicReceipt = $this->document_code->modelWithRelations()->find($this->invoice_id);

        throw_if(
            empty($this->electronicReceipt),
            new Exception('No existe documento o está eliminado.', Response::HTTP_NOT_FOUND)
        );

        throw_if(
            empty($this->electronicReceipt->company),
            new Exception('El documento no tiene compañía.', Response::HTTP_NOT_FOUND)
        );

        throw_if(
            empty($this->electronicReceipt->company->electronicSignature)
            || empty($this->electronicReceipt->company->electronicSignature->signature_password)
            || empty($this->electronicReceipt->company->electronicSignature->signature_file)
            || ! Storage::disk('electronic_signature')->exists($this->electronicReceipt->company->electronicSignature->signature_file),
            new Exception('Problemas con la firma electrónica y/o contraseña.', Response::HTTP_NOT_FOUND)
        );

        $this->electronicSignatureFile = Storage::disk('electronic_signature')->path($this->electronicReceipt->company->electronicSignature->signature_file);
        $this->electronicSignaturePassword = $this->electronicReceipt->company->electronicSignature->signature_password;

        $this->voucherType = $this->document_code->name();
        $this->webserviceValidateUrl = $this->environment->webserviceValidateUrl();
        $this->webserviceAuthorizeUrl = $this->environment->webserviceAuthorizeUrl();

        // TODO:
        // Check user has enough documents available to be consumed
        // $this->electronicReceipt;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
