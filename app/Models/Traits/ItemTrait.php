<?php

namespace App\Models\Traits;

use App\Models\Inventory\Product;
use App\Models\Inventory\Service;
use App\Models\Scopes\IsProductScope;
use App\Models\Scopes\IsServiceScope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait ItemTrait
{
    public function item(): BelongsTo
    {
        return $this
            ->belongsTo(Product::class, 'item_id')
            ->withoutGlobalScopes([
                IsProductScope::class, IsServiceScope::class,
            ])
            ->orderByRaw('FIELD('.Product::getModel()->qualifyColumn('type')." , 'good', 'service') ASC");
    }

    public function product(): BelongsTo
    {
        return $this
            ->belongsTo(Product::class, 'item_id')
            ->withoutGlobalScopes([
                IsServiceScope::class,
            ])
            ->orderBy('name');
    }

    public function service(): BelongsTo
    {
        return $this
            ->belongsTo(Service::class, 'item_id')
            ->withoutGlobalScopes([
                IsProductScope::class,
            ])
            ->orderBy('name');
    }
}
