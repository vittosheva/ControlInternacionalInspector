<?php

namespace App\Models\Persona;

use Althinect\FilamentSpatieRolesPermissions\Concerns\HasSuperAdmin;
use App\Enums\GenderEnum;
use App\Enums\IdentificationTypeEnum;
use App\Enums\PersonaTypeEnum;
use App\Models\Core\Company;
use App\Models\Core\CompanyUser;
use App\Models\Core\Department;
use App\Models\Traits\CategoryTrait;
use App\Models\Traits\CompanyTrait;
use App\Models\Traits\LocationTrait;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasDefaultTenant;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Tags\HasTags;
use Wildside\Userstamps\Userstamps;

class User extends Authenticatable implements Auditable, FilamentUser, HasAvatar, HasDefaultTenant, HasTenants, MustVerifyEmail
{
    use AuditableTrait;
    use AuthenticationLoggable;
    use CategoryTrait;
    use CompanyTrait;
    use HasApiTokens;
    use HasFactory;
    use HasLocks;
    use HasRoles;
    use HasSuperAdmin;
    use HasTags;
    use LocationTrait;
    use Notifiable;
    use SoftDeletes;
    use Userstamps;

    public static string $prefixName = 'EMP';

    protected $connection = 'mysql';

    protected $fillable = [
        'company_id', 'user_id', 'main_user_id', 'identification_type', 'identification_number', 'persona_type', 'name',
        'first_name', 'last_name', 'email', 'email_verified_at', 'password', 'remember_token', 'telephone', 'address',
        'notes', 'gender', 'country_id', 'state_id', 'city_id', 'parish', 'chart_of_account_number', 'signature',
        'category_id', 'main_subscribe_user', 'is_imported', 'is_user_logout', 'is_allowed_to_login', 'is_super',
        'is_active', 'created_by', 'updated_by', 'deleted_by', 'theme', 'theme_color', 'avatar_url',
        'virtual_name_identification_number', 'virtual_user_id_name', 'department_id', 'date_birth', 'date_hired',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'identification_type' => IdentificationTypeEnum::class,
        'persona_type' => PersonaTypeEnum::class,
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'gender' => GenderEnum::class,
        'date_birth' => 'date:Y-m-d',
        'date_hired' => 'date:Y-m-d',
        'main_subscribe_user' => 'bool',
        'is_imported' => 'bool',
        'is_user_logout' => 'bool',
        'is_allowed_to_login' => 'bool',
        'is_active' => 'bool',
        'is_super' => 'bool',
    ];

    public static function loginQuery(array $data = []): Builder
    {
        return DB::table(CompanyUser::getModel()->getTable())
            ->select([CompanyUser::getModel()->qualifyColumn('user_id'), Company::getModel()->qualifyColumn('name'), Company::getModel()->qualifyColumn('id')])
            ->join(User::getModel()->getTable(), User::getModel()->qualifyColumn('id'), '=', CompanyUser::getModel()->qualifyColumn('user_id'))
            ->join(Company::getModel()->getTable(), Company::getModel()->qualifyColumn('id'), '=', CompanyUser::getModel()->qualifyColumn('company_id'))
            ->whereNull(User::getModel()->qualifyColumn('deleted_at'))
            ->where(User::getModel()->qualifyColumn('email'), '=', $data['email'])
            ->where(CompanyUser::getModel()->qualifyColumn('is_allowed_to_login'), '=', 1)
            ->where(CompanyUser::getModel()->qualifyColumn('is_super'), '=', 0)
            ->where(CompanyUser::getModel()->qualifyColumn('is_active'), '=', 1);
    }

    protected static function boot(): void
    {
        parent::boot();

        //self::addGlobalScope(new IsActiveScope());

        static::creating(function ($model) {
            if (auth()->check() && ! empty(auth()->user()->company_id)) {
                $model->company_id = filament()->getTenant()->getAttributeValue('id') ?? auth()->user()->company_id;
                $model->main_user_id = self::query()
                    ->select('id')
                    ->where('company_id', '=', auth()->user()->company_id)
                    ->where('main_subscribe_user', '=', 1)
                    ->limit(1)
                    ->first()?->id ?? null;
            }

            $model->user_id = sku();
        });

        self::updated(function ($model) {
            $company = filament()->getTenant();

            if (! $company instanceof Company) {
                return;
            }

            /*if ($model->is_active || $model->is_allowed_to_login) {
                DB::table('company_user')
                    ->where('user_id', '=', $model->id)
                    ->where('company_id', '=', $company->getAttributeValue('id'))
                    ->delete();
            }

            $company->members()->attach($model);*/
        });
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($this->is_super && $this->isSuperAdmin()) {
            return true;
        }

        if (! $this->hasVerifiedEmail()) {
            return false;
        }

        if (! $this->hasRole(['Inspector', 'Administrador'])) {
            return false;
        }

        return true;
    }

    public function canAccessTenant(Model $tenant): bool
    {
        return $this->companies->contains($tenant);
    }

    public function getTenants(Panel $panel): Collection
    {
        return $this->companies;
    }

    public function getDefaultTenant(Panel $panel): ?Model
    {
        //return $this->latestCompany;
        return filament()->getTenant();
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return ! empty($this->avatar_url) ? Storage::disk('avatar_images')->url($this->avatar_url) : null;
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function isInspector(): bool
    {
        return $this->hasRole('Inspector');
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('Administrador');
    }

    public function isAccountant(): bool
    {
        return $this->hasRole('Contador');
    }
}
