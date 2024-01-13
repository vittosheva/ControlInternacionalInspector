<?php

namespace App\Models\Inventory;

use App\Enums\ItemTypeEnum;
use App\Models\Scopes\CompanyScope;
use App\Models\Scopes\IsActiveScope;
use App\Models\Scopes\IsProductScope;
use App\Models\Traits\CategoryTrait;
use App\Models\Traits\CompanyTrait;
use App\Models\Traits\UnitTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Tags\HasTags;
use Wildside\Userstamps\Userstamps;

class Product extends Model implements Auditable, HasMedia
{
    use AuditableTrait;
    use CategoryTrait;
    use CompanyTrait;
    use HasLocks;
    use HasTags;
    use InteractsWithMedia;
    use SoftDeletes;
    use UnitTrait;
    use Userstamps;

    public static string $prefixName = 'PRO';

    protected $connection = 'mysql';

    protected $table = 'items';

    protected $fillable = [
        'company_id', 'item_id', 'main_code', 'auxiliary_code', 'unit_code', 'type', 'category_id', 'brand_id', 'name',
        'short_description', 'description', 'bar_code', 'bar_code_file', 'qr_code', 'qr_code_file', 'additional_notes',
        'price_1', 'price_2', 'price_3', 'price_4', 'price_5', 'pvp_price', 'cost_price', 'purchase_price',
        'tax_iva_id', 'tax_ice_id', 'rate_ice', 'quantity', 'stock_enable',
        'chart_of_account_number_sale', 'chart_of_account_number_sale_inventory', 'chart_of_account_number_purchase',
        'chart_of_account_number_purchase_cost', 'chart_of_account_number_purchase_expense', 'chart_of_account_number_purchase_inventory',
        'has_commission', 'is_sale', 'is_purchase', 'is_active', 'expired_at', 'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'type' => ItemTypeEnum::class,
        'stock_enable' => 'boolean',
        'has_commission' => 'boolean',
        'is_sale' => 'boolean',
        'is_purchase' => 'boolean',
        'is_active' => 'boolean',
        'expired_at' => 'datetime',
    ];

    protected static function boot(): void
    {
        parent::boot();

        self::addGlobalScope(new CompanyScope());
        self::addGlobalScope(new IsProductScope());
        self::addGlobalScope(new IsActiveScope());

        static::creating(function ($model) {
            $model->type = ItemTypeEnum::GOOD;
        });
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }
}
