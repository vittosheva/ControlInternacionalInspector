<?php

namespace App\Forms\Components;

use Coolsam\FilamentFlatpickr\Forms\Components\Flatpickr;
use Illuminate\Support\HtmlString;
use Livewire\Component;

class DueDateFlatpickr extends Flatpickr
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Due Date'))
            ->autocomplete(false)
            ->prefixIcon('heroicon-o-calendar-days')
            ->minDate(today())
            ->default(null)
            ->altFormat('d-m-Y')
            ->dateFormat('Y-m-d')
            ->placeholder(now()->format('Y-m-d'))
            ->rules([
                'string',
                'date_format:Y-m-d',
            ])
            ->live(onBlur: true)
            ->afterStateUpdated(fn (Component $livewire, Flatpickr $component) => $livewire->validateOnly($component->getStatePath()))
            ->hint(function ($component, string $operation) {
                if (! in_array($operation, ['create', 'edit'])) {
                    return null;
                }

                $hint = '<div class="flex flex-wrap space-x-2">';

                $dates = [
                    [
                        'label' => 'Sem',
                        'title' => 'Una semana',
                        'value' => now()->addWeek()->format('Y-m-d'),
                        'class' => 'bg-sky',
                    ],
                    [
                        'label' => '15 dias',
                        'title' => 'Dos semanas',
                        'value' => now()->addWeeks(2)->format('Y-m-d'),
                        'class' => 'bg-indigo',
                    ],
                    [
                        'label' => 'Mes',
                        'title' => 'Un mes',
                        'value' => now()->addMonth()->format('Y-m-d'),
                        'class' => 'bg-primary-500',
                    ],
                ];

                foreach ($dates as $date) {
                    $hint .= /** @lang text */
                        "<span wire:click=\"\$set('{$component->getStatePath()}', '{$date['value']}')\" class=\"font-medium px-2 py-0.5 rounded-xl {$date['class']} text-white text-xs tracking-tight cursor-pointer\" title=\"{$date['title']}\">
                            {$date['label']}
                        </span>";
                }

                $hint .= '</div>';

                return new HtmlString($hint);
            });
    }
}
