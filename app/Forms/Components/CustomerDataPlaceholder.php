<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Get;
use Illuminate\Support\HtmlString;

class CustomerDataPlaceholder extends Placeholder
{
    public ?string $persona = 'persona_id';

    public function persona($persona): static
    {
        $this->persona = $persona;

        return $this;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Customer Data'))
            ->content(function (Get $get) {
                $personId = $get($this->persona);
                $placeholder = new HtmlString('
                    <span>--</span><br>
                    <span>--</span><br>
                    <span>--</span><br>
                    <span>--</span>
                ');

                if (blank($personId) || $get('final_consumer')) {
                    return $placeholder;
                }

                return new HtmlString('
                    <span class="font-bold">'.$get('persona_business_name').'</span><br>
                    <span class="font-bold">'.$get('persona_identification_number').'</span><br>
                    <span>'.$get('persona_address').'</span><br>
                    <span>'.$get('persona_email').'</span><br>
                ');
            })
            ->extraAttributes([
                'class' => 'bg-white border border-1 rounded-xl p-4',
            ]);
    }
}
