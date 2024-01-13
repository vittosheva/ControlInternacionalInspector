<?php

namespace App\Actions\Filament;

use Closure;
use Filament\Actions\Action;

class GoBackAction extends Action
{
    protected ?Closure $mutateRecordDataUsing = null;

    public static function getDefaultName(): ?string
    {
        return 'goBack';
    }

    public function mutateRecordDataUsing(?Closure $callback): static
    {
        $this->mutateRecordDataUsing = $callback;

        return $this;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Go Back'))
            ->iconButton()
            ->icon('heroicon-m-arrow-left')
            ->tooltip(__('Go to page :page', ['page' => 'Listado de '.$this->getRecordTitle()]))
            ->disabledForm();
    }
}
