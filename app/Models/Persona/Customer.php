<?php

namespace App\Models\Persona;

use App\Enums\IdentificationTypeEnum;
use App\Enums\PersonaTypeEnum;
use App\Enums\TypePersonEnum;
use App\Models\Scopes\CompanyScope;
use App\Models\Scopes\IsActiveScope;
use App\Models\Traits\CategoryTrait;
use App\Models\Traits\CompanyTrait;
use App\Models\Traits\LocationTrait;
use App\Models\Traits\PersonTrait;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Propaganistas\LaravelPhone\Casts\RawPhoneNumberCast;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;
use Spatie\Permission\Traits\HasRoles;
use Wildside\Userstamps\Userstamps;

class Customer extends Authenticatable implements Auditable, FilamentUser, HasTenants, MustVerifyEmail
{
    use AuditableTrait;
    use AuthenticationLoggable;
    use CategoryTrait;
    use CompanyTrait;
    use HasLocks;
    use HasRoles;
    use LocationTrait;
    use Notifiable;
    use PersonTrait;
    use SoftDeletes;
    use Userstamps;

    public static string $prefixName = 'CLI';

    protected $connection = 'mysql';

    protected $fillable = [
        'company_id', 'customer_id', 'persona_type', 'identification_type', 'identification_number', 'business_name',
        'trade_name', 'email', 'email_verified_at', 'emails_to_send_invoices', 'password', 'remember_token',
        'contributor_activity', 'legal_representative', 'telephone', 'address', 'avatar', 'notes', 'country_id',
        'state_id', 'city_id', 'parish', 'salesperson_id', 'chart_of_account_number', 'signature', 'category_id',
        'lockout_time', 'last_login_time', 'last_login_ip', 'last_logout_time', 'is_user_logout', 'is_allowed_to_login',
        'is_imported', 'is_active', 'created_by', 'updated_by', 'deleted_by', 'not_deleted', 'type_person',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'persona_type' => PersonaTypeEnum::class,
        'identification_type' => IdentificationTypeEnum::class,
        'email_verified_at' => 'datetime',
        'emails_to_send_invoices' => 'json',
        'password' => 'hashed',
        //'telephone' => RawPhoneNumberCast::class.':EC',
        'lockout_time' => 'datetime',
        'last_login_time' => 'datetime',
        'last_logout_time' => 'datetime',
        'is_user_logout' => 'bool',
        'is_allowed_to_login' => 'bool',
        'is_imported' => 'bool',
        'is_active' => 'bool',
        'type_person' => TypePersonEnum::class,
    ];

    protected static function boot(): void
    {
        parent::boot();

        self::addGlobalScope(new CompanyScope());
        self::addGlobalScope(new IsActiveScope());

        static::creating(function ($model) {
            $model->password = bcrypt(Str::password(config('dorsi.passwords.min_length')));
        });
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if (
            empty($this->is_active) ||
            empty($this->is_allowed_to_login)
            || ! $this->hasVerifiedEmail()
            || $this->cannot('access Main')
        ) {
            return false;
        }

        $permissions = Str::of(implode(' ', preg_split('/(?=[A-Z])/', $panel->getId())))
            ->ucfirst()
            ->prepend('access ')
            ->toString();

        return $this->can($permissions);
    }

    public function canAccessTenant(Model $tenant): bool
    {
        return $this->companies->contains($tenant);
    }

    public function getTenants(Panel $panel): Collection
    {
        return $this->companies;
    }
}
