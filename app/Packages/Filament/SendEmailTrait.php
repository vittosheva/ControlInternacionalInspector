<?php

namespace App\Packages\Filament;

use App\Mail\SendPdfXmlMail;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

trait SendEmailTrait
{
    private ?string $subject = null;

    public function subject(?string $subject = null): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function emailForm()
    {
        return Grid::make()
            ->schema([
                TagsInput::make('emails')
                    ->label(__('Email'))
                    ->placeholder('email@dominio.com')
                    ->default(function ($record) {
                        //$model = ($record->document_code->referenceToPersona() ?? 'customer');
                        $model = 'customer';

                        return collect($record->load($model.':id,emails_to_send_invoices')->$model->emails_to_send_invoices)
                            ->push($record->persona_email)
                            ->unique()
                            ->toArray();
                    })
                    ->splitKeys(['Tab', ' '])
                    ->nestedRecursiveRules([
                        'email',
                    ])
                    ->hintIcon('heroicon-o-question-mark-circle', __('You can enter multiple emails using the TAB key, ENTER or a space'))
                    ->required(),
                TextInput::make('subject')
                    ->label(__('Subject'))
                    ->default(fn ($record) => $this->subject ?? __('Sending Document by email', ['document' => $record->document_code->translate()]))
                    ->required(),
                Fieldset::make()
                    ->label(__('Attachments'))
                    ->schema([
                        Toggle::make('pdf')
                            ->label(__('PDF'))
                            ->onIcon('heroicon-m-document-text')
                            ->offIcon('heroicon-m-document-text')
                            ->default(fn ($record) => filled($record->pdf) && Storage::disk('pdfs')->exists($record->pdf))
                            ->disabled(fn ($record) => empty($record->pdf) || ! Storage::disk('pdfs')->exists($record->pdf))
                            ->columnSpan(1),
                        Toggle::make('xml')
                            ->label(__('XML'))
                            ->onIcon('heroicon-m-document-text')
                            ->offIcon('heroicon-m-document-text')
                            ->default(fn ($record) => filled($record->xml) && Storage::disk('xmls_autorizados')->exists($record->xml))
                            ->disabled(fn ($record) => empty($record->xml) || ! Storage::disk('xmls_autorizados')->exists($record->xml))
                            ->columnSpan(1),
                    ])
                    ->columns(4),
                RichEditor::make('body')
                    ->label(__('Content'))
                    ->default(function ($record) {
                        return view('emails.basic-document', [
                            'persona' => $record->persona_business_name,
                            'documentNumber' => $record->invoice_id,
                            'documentCode' => $record->document_code->prefix(),
                            'documentName' => $record->document_code->translate(),
                            'companyName' => filament()->getTenant()->getAttributeValue('name'),
                            'companyRuc' => filament()->getTenant()->getAttributeValue('ruc'),
                        ])->render();
                    })
                    ->required(),
                Checkbox::make('cc')
                    ->label(__('Send with copy')),
            ])
            ->columns(1)
            ->columnSpanFull();
    }

    public function processEmail(array $data, $record): void
    {
        $emails = $data['emails'];
        $pdf = ! empty($data['pdf']) && Storage::disk('pdfs')->exists($record->pdf) ? $record->pdf : null;
        $xml = ! empty($data['xml']) && Storage::disk('xmls_autorizados')->exists($record->xml) ? $record->xml : null;

        foreach ($emails as $email) {
            Mail::to($email)
                ->locale(config('app.locale'))
                ->send((new SendPdfXmlMail($data['body'], $pdf, $xml))->afterCommit());
        }

        $sendEmails = implode('<br>', array_map(function ($name) {
            return '&bull; '.$name;
        }, $emails));

        if ($data['cc']) {
            $email = auth()->user()->getAttributeValue('email');
            Mail::to($email)
                ->locale(config('app.locale'))
                ->send((new SendPdfXmlMail($data['body'], $pdf, $xml))->afterCommit());
            $sendEmails = $sendEmails.'<br>Con copia: '.$email;
        }

        Notification::make()
            ->title(__('Sent email successfully:'))
            ->body(fn () => $sendEmails)
            ->success()
            ->color(Color::Green)
            ->send();
    }
}
