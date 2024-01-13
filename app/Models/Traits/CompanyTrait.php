<?php

namespace App\Models\Traits;

use App\Models\Core\Company;
use App\Models\Core\CompanyUser;
use App\Models\Persona\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

trait CompanyTrait
{
    protected static function bootCompanyTrait(): void
    {
        static::creating(function ($model) {
            $model->company_id = auth()->user()->company_id ?? null;
        });
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function companies(): BelongsToMany
    {
        return $this
            ->belongsToMany(Company::class, CompanyUser::class)
            ->withTimestamps();
    }

    public function latestCompany(): BelongsTo
    {
        return $this
            ->belongsTo(Company::class, 'id', 'created_by')
            ->latest();
    }

    public function companyUser()
    {
        return $this->hasManyThrough(Company::class, CompanyUser::class, 'company_id', 'id', 'id', 'user_id');
    }

    public function isMember(): bool
    {
        /*if (empty($this->company_id)) {
            return false;
        }*/

        return DB::table(CompanyUser::getModel()->getTable())
            ->select([CompanyUser::getModel()->qualifyColumn('user_id'), Company::getModel()->qualifyColumn('name'), Company::getModel()->qualifyColumn('id')])
            ->join(User::getModel()->getTable(), User::getModel()->qualifyColumn('id'), '=', CompanyUser::getModel()->qualifyColumn('user_id'))
            ->join(Company::getModel()->getTable(), Company::getModel()->qualifyColumn('id'), '=', CompanyUser::getModel()->qualifyColumn('company_id'))
            ->whereNull(User::getModel()->qualifyColumn('deleted_at'))
            ->where(CompanyUser::getModel()->qualifyColumn('company_id'), '=', filament()->getTenant()->getAttributeValue('id'))
            ->where(CompanyUser::getModel()->qualifyColumn('is_allowed_to_login'), '=', 1)
            ->where(CompanyUser::getModel()->qualifyColumn('is_super'), '=', 0)
            ->where(CompanyUser::getModel()->qualifyColumn('is_active'), '=', 1)
            ->exists();
    }
}
