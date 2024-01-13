<?php

namespace App\Models\Traits;

use App\Models\Common\CategoryType;
use App\Models\Inventory\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait CategoryTrait
{
    public function categoryType(): BelongsTo
    {
        return $this->belongsTo(CategoryType::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
