<?php

namespace App\Forms\Components;

use App\Enums\DocumentEnum;
use App\Models\Document\Invoice;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\DB;

class RelatedDocumentSelect extends Select
{
    public string|null|array $documentCode = null;

    public function document($documentCode): self
    {
        $this->documentCode = $documentCode;

        return $this;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Related Document'))
            ->getSearchResultsUsing(function (string $search): array {
                return DB::table(Invoice::getModel()->getTable())
                    ->select(['id', 'document_number', 'document_code'])
                    ->where('company_id', '=', filament()->getTenant()->getAttributeValue('id'))
                    ->whereNull('deleted_at')
                    ->where('document_number', 'like', "{$search}%")
                    ->orderBy('document_code')
                    ->orderBy('establishment')
                    ->orderBy('emission_point')
                    ->orderBy('sequential')
                    ->limit(50)
                    ->get()
                    ->mapWithKeys(function ($result): array {
                        return [
                            $result->id => '<span class="font-semibold">'.DocumentEnum::tryFrom($result->document_code)->translate().':</span> '.$result->document_number,
                        ];
                    })
                    ->toArray();
            })
            ->allowHtml();
    }
}
