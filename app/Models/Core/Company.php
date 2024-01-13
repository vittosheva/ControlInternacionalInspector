<?php

namespace App\Models\Core;

use App\Enums\EnvironmentEnum;
use App\Models\Inventory\Category;
use App\Models\Inventory\Product;
use App\Models\Inventory\Service;
use App\Models\Inventory\Tag;
use App\Models\Persona\User;
use App\Models\Scopes\IsActiveScope;
use App\Models\Setting\Unit;
use App\Models\Traits\LocationTrait;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasCurrentTenantLabel;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Wildside\Userstamps\Userstamps;

class Company extends Model implements Auditable, HasAvatar, HasCurrentTenantLabel, HasName
{
    use AuditableTrait;
    use HasLocks;
    use LocationTrait;
    use SoftDeletes;
    use Userstamps;

    protected $connection = 'mysql';

    protected $fillable = [
        'environment_id', 'business_activity_id', 'ruc', 'name', 'trade_name', 'email', 'sri_password', 'logo',
        'use_logo', 'favicon', 'website', 'telephone', 'telephone_contact', 'address', 'legal_representative',
        'main_user_id', 'country_id', 'currently_using', 'is_active', 'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'environment_id' => EnvironmentEnum::class,
        'sri_password' => 'encrypted',
        'use_logo' => 'bool',
        'currently_using' => 'bool',
        'is_active' => 'bool',
    ];

    public static function pluckToArray(): array
    {
        return static::query()
            ->pluck('name', 'id')
            ->toArray();
    }

    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new IsActiveScope());

        // here assign this team to a global user with a global default role
        self::created(function ($model) {
            // temporary: get session team_id for restore at an end
            $session_team_id = getPermissionsTeamId();
            // set actual new team_id to package instance
            setPermissionsTeamId($model);
            // get the admin user and assign roles/permissions on a new team model
            User::find(1)->assignRole('Super Admin');
            // restore session team_id to package instance using temporary value stored above
            setPermissionsTeamId($session_team_id);
        });
    }

    public function getFilamentName(): string
    {
        return Str::of($this->name ?? null)->upper()->toString();
    }

    public function getCurrentTenantLabel(): string
    {
        return 'Compañía seleccionada:';
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url ?? '';
    }

    public function mainUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'main_user_id', 'user_id');
    }

    public function members(): BelongsToMany
    {
        return $this
            ->belongsToMany(User::class, CompanyUser::class)
            ->using(CompanyUser::class)
            ->withTimestamps()
            ->orderByPivot('created_at', 'desc');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function companySettings(): HasMany
    {
        return $this->hasMany(CompanySetting::class);
    }

    public function taxInformation(): HasMany
    {
        return $this
            ->companySettings()
            ->where('label', '=', 'tax_information');
    }

    public function systemInformation(): HasMany
    {
        return $this
            ->companySettings()
            ->where('label', '=', 'system_information');
    }

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}
