<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Common{
/**
 * App\Models\Common\CategoryType
 *
 * @property int $id
 * @property string $name
 * @property string $system_name
 * @property string|null $color
 * @property bool|null $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Inventory\Category|null $category
 * @property-read CategoryType|null $categoryType
 * @property-read \App\Models\Inventory\Category|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType whereSystemName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType withoutTrashed()
 */
	class CategoryType extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\IdentificationType
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|IdentificationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IdentificationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IdentificationType query()
 */
	class IdentificationType extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Core{
/**
 * App\Models\Core\Company
 *
 * @property int $id
 * @property string $ruc
 * @property string $name
 * @property string|null $trade_name
 * @property string|null $email
 * @property mixed|null $sri_password
 * @property string|null $logo
 * @property bool|null $use_logo
 * @property string|null $favicon
 * @property string|null $website
 * @property string|null $telephone
 * @property string|null $telephone_contact
 * @property string|null $address
 * @property string|null $legal_representative
 * @property string|null $main_user_id
 * @property int|null $country_id
 * @property bool|null $currently_using
 * @property bool $is_active
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \App\Enums\EnvironmentEnum $environment_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inventory\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \App\Models\Locale\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\CompanySetting> $companySettings
 * @property-read int|null $company_settings_count
 * @property-read \App\Models\Locale\Country|null $country
 * @property-read \App\Models\Persona\User|null $creator
 * @property-read \App\Models\Persona\User|null $destroyer
 * @property-read \App\Models\Persona\User|null $editor
 * @property-read \App\Models\Persona\User|null $mainUser
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Persona\User> $members
 * @property-read int|null $members_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inventory\Product> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\Setting\ResourceLock|null $resourceLock
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inventory\Service> $services
 * @property-read int|null $services_count
 * @property-read \App\Models\Locale\State|null $state
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\CompanySetting> $systemInformation
 * @property-read int|null $system_information_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inventory\Tag> $tags
 * @property-read int|null $tags_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\CompanySetting> $taxInformation
 * @property-read int|null $tax_information_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Setting\Unit> $units
 * @property-read int|null $units_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Persona\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCurrentlyUsing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereFavicon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLegalRepresentative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereMainUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereRuc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereSriPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTelephoneContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTradeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUseLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Company withoutTrashed()
 */
	class Company extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable, \Filament\Models\Contracts\HasAvatar, \Filament\Models\Contracts\HasCurrentTenantLabel, \Filament\Models\Contracts\HasName {}
}

namespace App\Models\Core{
/**
 * App\Models\Core\CompanySetting
 *
 * @property int $id
 * @property int $company_id
 * @property string|null $label
 * @property string $key
 * @property string|null $value
 * @property array|null $attributes
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companies
 * @property-read int|null $companies_count
 * @property-read \App\Models\Core\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companyUser
 * @property-read int|null $company_user_count
 * @property-read \App\Models\Persona\User|null $creator
 * @property-read \App\Models\Persona\User|null $destroyer
 * @property-read \App\Models\Persona\User|null $editor
 * @property-read \App\Models\Core\Company|null $latestCompany
 * @method static \Illuminate\Database\Eloquent\Builder|CompanySetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanySetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanySetting onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanySetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanySetting whereAttributes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanySetting whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanySetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanySetting whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanySetting whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanySetting whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanySetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanySetting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanySetting whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanySetting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanySetting whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanySetting whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanySetting withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanySetting withoutTrashed()
 */
	class CompanySetting extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Core{
/**
 * App\Models\Core\CompanyUser
 *
 * @property int $user_id
 * @property int $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $is_allowed_to_login
 * @property int $is_super
 * @property int $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser whereIsAllowedToLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser whereIsSuper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser whereUserId($value)
 */
	class CompanyUser extends \Eloquent {}
}

namespace App\Models\Core{
/**
 * App\Models\Core\Department
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companies
 * @property-read int|null $companies_count
 * @property-read \App\Models\Core\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companyUser
 * @property-read int|null $company_user_count
 * @property-read \App\Models\Persona\User $creator
 * @property-read \App\Models\Persona\User $destroyer
 * @property-read \App\Models\Persona\User $editor
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Persona\User> $employeeships
 * @property-read int|null $employeeships_count
 * @property-read \App\Models\Core\Company|null $latestCompany
 * @property-read \App\Models\Persona\User|null $manager
 * @property-read Department|null $parent
 * @property-read \App\Models\Setting\ResourceLock|null $resourceLock
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Department> $subDepartment
 * @property-read int|null $sub_department_count
 * @method static \Illuminate\Database\Eloquent\Builder|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Department query()
 * @method static \Illuminate\Database\Eloquent\Builder|Department withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Department withoutTrashed()
 */
	class Department extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Core{
/**
 * App\Models\Core\Media
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property string|null $uuid
 * @property string $collection_name
 * @property string $name
 * @property string $file_name
 * @property string|null $mime_type
 * @property string $disk
 * @property string|null $conversions_disk
 * @property int $size
 * @property array $manipulations
 * @property array $custom_properties
 * @property array $generated_conversions
 * @property array $responsive_images
 * @property int|null $order_column
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $deleted_by
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Persona\User|null $creator
 * @property-read \App\Models\Persona\User|null $destroyer
 * @property-read \App\Models\Persona\User|null $editor
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, static> all($columns = ['*'])
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, static> get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media ordered()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCollectionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereConversionsDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCustomProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereGeneratedConversions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereManipulations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereResponsiveImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUuid($value)
 */
	class Media extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Core{
/**
 * App\Models\Core\Permission
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $virtual_name_guard_name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Persona\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereVirtualNameGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission withoutRole($roles, $guard = null)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models\Core{
/**
 * App\Models\Core\Role
 *
 * @property int $id
 * @property int|null $company_id
 * @property string $name
 * @property string $guard_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Persona\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role withoutPermission($permissions)
 */
	class Role extends \Eloquent {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\BathroomComplianceObservation
 *
 * @property int $id
 * @property int $code
 * @property string $description
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|BathroomComplianceObservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BathroomComplianceObservation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BathroomComplianceObservation query()
 * @method static \Illuminate\Database\Eloquent\Builder|BathroomComplianceObservation whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BathroomComplianceObservation whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BathroomComplianceObservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BathroomComplianceObservation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BathroomComplianceObservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BathroomComplianceObservation whereUpdatedAt($value)
 */
	class BathroomComplianceObservation extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\BathroomState
 *
 * @property int $id Identifier
 * @property string $name Name
 * @property string $color HEX color code
 * @property int $active Activated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|BathroomState newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BathroomState newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BathroomState query()
 * @method static \Illuminate\Database\Eloquent\Builder|BathroomState whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BathroomState whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BathroomState whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BathroomState whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BathroomState whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BathroomState whereUpdatedAt($value)
 */
	class BathroomState extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\Company
 *
 * @property int $id Identifier
 * @property string $name Name
 * @property string $photo Photo file name (with extension)
 * @property int $year Current year of data entry
 * @property int $month Current month of data entry
 * @property string|null $files URL of the repository of external files
 * @property string|null $letters URL of the repository of external letters
 * @property string $marketer Marketer
 * @property int $active Activated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $price_super
 * @property string|null $price_extra
 * @property string|null $price_diesel_1
 * @property string|null $price_diesel_2
 * @property string|null $mode_number
 * @property string|null $price_eco_plus
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inspections\Station> $stations
 * @property-read int|null $stations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereFiles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLetters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereMarketer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereModeNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePriceDiesel1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePriceDiesel2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePriceEcoPlus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePriceExtra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePriceSuper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereYear($value)
 */
	class Company extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\ComplementaryService
 *
 * @property int $id
 * @property int $code
 * @property string $description
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inspections\ControlRecordService> $controlRecordService
 * @property-read int|null $control_record_service_count
 * @method static \Illuminate\Database\Eloquent\Builder|ComplementaryService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ComplementaryService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ComplementaryService query()
 * @method static \Illuminate\Database\Eloquent\Builder|ComplementaryService whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComplementaryService whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComplementaryService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComplementaryService whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComplementaryService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComplementaryService whereUpdatedAt($value)
 */
	class ComplementaryService extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\ControlRecord
 *
 * @property int $id Identifier
 * @property \Illuminate\Support\Carbon $inspection_date Inspection date
 * @property int $year Year
 * @property int $month Month
 * @property string|null $observations General observations
 * @property float|null $octane_super Octane value for super
 * @property float|null $octane_extra Octane value for extra/ecopaise
 * @property float|null $flash_point Flash point value for diesel
 * @property float|null $water_in_tank_super_1 Value of water in tank 1 for super
 * @property float|null $water_in_tank_super_2 Value of water in tank 2 for super
 * @property float|null $water_in_tank_extra_1 Value of water in tank 1 for extra
 * @property float|null $water_in_tank_extra_2 Value of water in tank 2 for extra
 * @property float|null $water_in_tank_extra_3 Value of water in tank 3 for extra
 * @property float|null $water_in_tank_diesel_1 Value of water in tank 1 for diesel
 * @property float|null $water_in_tank_diesel_2 Value of water in tank 2 for diesel
 * @property int $company_id Company identifier
 * @property int $station_id Station identifier
 * @property int|null $bathrooms_state_id Bathroom state identifier
 * @property int|null $arch_letter_sent
 * @property int|null $arch_letter_delivered
 * @property string|null $arch_letter_delivered_at
 * @property string|null $arch_letter_sent_at
 * @property int $active Activated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $price_diesel_1
 * @property string|null $price_diesel_2
 * @property string|null $price_extra
 * @property string|null $price_super
 * @property float|null $octane_eco_plus
 * @property string|null $price_eco_plus
 * @property string|null $inspector_notes
 * @property string|null $serafin_code
 * @property int|null $allowed_to_place_calibration_seals
 * @property string|null $responsible_for_calibration_letter
 * @property int|null $inspector_name_2
 * @property int|null $created_by Related User in Inspector database (not local users tables)
 * @property int|null $updated_by Related User in Inspector database (not local users tables)
 * @property string|null $inspection_report_pdf
 * @property bool|null $admin_authorization
 * @property-read \App\Models\Persona\User|null $additionalInspector
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inspections\ControlRecordBathroom> $bathroomComplianceObservations
 * @property-read int|null $bathroom_compliance_observations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inspections\BathroomComplianceObservation> $bathroomComplianceObservationsMany
 * @property-read int|null $bathroom_compliance_observations_many_count
 * @property-read \App\Models\Inspections\BathroomState|null $bathroomState
 * @property-read \App\Models\Inspections\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inspections\ControlRecordService> $complementaryServices
 * @property-read int|null $complementary_services_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inspections\ComplementaryService> $complementaryServicesMany
 * @property-read int|null $complementary_services_many_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inspections\ControlRecordDetail> $controlDetails
 * @property-read int|null $control_details_count
 * @property-read \App\Models\Persona\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inspections\ControlRecordDetail> $details
 * @property-read int|null $details_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inspections\ControlRecordEnvironmental> $environmentalObservations
 * @property-read int|null $environmental_observations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inspections\EnvironmentalObservation> $environmentalObservationsMany
 * @property-read int|null $environmental_observations_many_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inspections\ControlRecordMeasurementDrawOut> $measurementDrawOuts
 * @property-read int|null $measurement_draw_outs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inspections\ControlRecordMeasurementTank> $measurementTanks
 * @property-read int|null $measurement_tanks_count
 * @property-read \App\Models\Inspections\Station $station
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord query()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereAdminAuthorization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereAllowedToPlaceCalibrationSeals($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereArchLetterDelivered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereArchLetterDeliveredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereArchLetterSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereArchLetterSentAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereBathroomsStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereFlashPoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereInspectionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereInspectionReportPdf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereInspectorName2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereInspectorNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereObservations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereOctaneEcoPlus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereOctaneExtra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereOctaneSuper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord wherePriceDiesel1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord wherePriceDiesel2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord wherePriceEcoPlus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord wherePriceExtra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord wherePriceSuper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereResponsibleForCalibrationLetter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereSerafinCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereWaterInTankDiesel1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereWaterInTankDiesel2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereWaterInTankExtra1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereWaterInTankExtra2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereWaterInTankExtra3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereWaterInTankSuper1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereWaterInTankSuper2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecord whereYear($value)
 */
	class ControlRecord extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\ControlRecordBathroom
 *
 * @property int $id
 * @property int $control_records_id
 * @property int $bathroom_compliance_observations_id
 * @property int $men
 * @property int $women
 * @property int $disability_person
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Inspections\BathroomComplianceObservation $bathroomComplianceObservation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inspections\BathroomComplianceObservation> $bathroomComplianceObservations
 * @property-read int|null $bathroom_compliance_observations_count
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordBathroom newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordBathroom newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordBathroom query()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordBathroom whereBathroomComplianceObservationsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordBathroom whereControlRecordsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordBathroom whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordBathroom whereDisabilityPerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordBathroom whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordBathroom whereMen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordBathroom whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordBathroom whereWomen($value)
 */
	class ControlRecordBathroom extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\ControlRecordDetail
 *
 * @property int $id Identifier
 * @property int $control_record_id Control identifier
 * @property int $hose_id Hose identifier
 * @property string $seal_found Seal found
 * @property string $seal_left Seal left
 * @property float $quantity Quantity
 * @property float|null $octane
 * @property string|null $observations General CIE observations
 * @property string|null $company_observations General Company observations
 * @property int|null $measurement_id Measurement identifier
 * @property int|null $measurement_id_sec_1 Measurement secundary 1 identifier
 * @property int|null $measurement_id_sec_2 Measurement secundary 2 identifier
 * @property int|null $observation_id Observation identifier
 * @property int|null $company_observation_id Observation identifier
 * @property int|null $letter_responsable_id Letter responsable identifier
 * @property string|null $letter_observations Letter observations
 * @property string|null $letter_seal Letter CI seal
 * @property string|null $totalizator
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Inspections\ControlRecord $controlRecord
 * @property-read \App\Models\Inspections\Hose $hose
 * @property-read \App\Models\Inspections\Measurement|null $measurement
 * @property-read \App\Models\Inspections\Measurement|null $measurement2
 * @property-read \App\Models\Inspections\Observation|null $observation
 * @property-read \App\Models\Inspections\Observation|null $observationCompany
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereCompanyObservationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereCompanyObservations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereControlRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereHoseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereLetterObservations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereLetterResponsableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereLetterSeal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereMeasurementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereMeasurementIdSec1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereMeasurementIdSec2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereObservationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereObservations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereOctane($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereSealFound($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereSealLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereTotalizator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordDetail whereUpdatedAt($value)
 */
	class ControlRecordDetail extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\ControlRecordEnvironmental
 *
 * @property int $id
 * @property int $control_records_id
 * @property int $environmental_observations_id
 * @property int $complete
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Inspections\EnvironmentalObservation $environmentalObservation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inspections\EnvironmentalObservation> $environmentalObservations
 * @property-read int|null $environmental_observations_count
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordEnvironmental newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordEnvironmental newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordEnvironmental query()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordEnvironmental whereComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordEnvironmental whereControlRecordsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordEnvironmental whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordEnvironmental whereEnvironmentalObservationsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordEnvironmental whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordEnvironmental whereUpdatedAt($value)
 */
	class ControlRecordEnvironmental extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\ControlRecordMeasurementDrawOut
 *
 * @property int $id
 * @property int $control_records_id
 * @property string $oil
 * @property int $gallons
 * @property int|null $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementDrawOut newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementDrawOut newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementDrawOut query()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementDrawOut whereControlRecordsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementDrawOut whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementDrawOut whereGallons($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementDrawOut whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementDrawOut whereOil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementDrawOut whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementDrawOut whereUpdatedAt($value)
 */
	class ControlRecordMeasurementDrawOut extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\ControlRecordMeasurementTank
 *
 * @property int $id
 * @property int $control_records_id
 * @property string $oil
 * @property int $product
 * @property int|null $water
 * @property int|null $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementTank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementTank newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementTank query()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementTank whereControlRecordsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementTank whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementTank whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementTank whereOil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementTank whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementTank whereProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementTank whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordMeasurementTank whereWater($value)
 */
	class ControlRecordMeasurementTank extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\ControlRecordService
 *
 * @property int $id
 * @property int $control_records_id
 * @property int $complementary_services_id
 * @property int $complete
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Inspections\ComplementaryService $complementaryService
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inspections\ComplementaryService> $complementaryServices
 * @property-read int|null $complementary_services_count
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordService query()
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordService whereComplementaryServicesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordService whereComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordService whereControlRecordsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ControlRecordService whereUpdatedAt($value)
 */
	class ControlRecordService extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\EnvironmentalObservation
 *
 * @property int $id
 * @property int $code
 * @property string $description
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|EnvironmentalObservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EnvironmentalObservation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EnvironmentalObservation query()
 * @method static \Illuminate\Database\Eloquent\Builder|EnvironmentalObservation whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnvironmentalObservation whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnvironmentalObservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnvironmentalObservation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnvironmentalObservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnvironmentalObservation whereUpdatedAt($value)
 */
	class EnvironmentalObservation extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\GasStationObservation
 *
 * @property int $id Identifier
 * @property string $name Name
 * @property int $priority Priority: 2=HIGH, 1=NORMAL, 0=MINOR
 * @property string $color HEX color code
 * @property int $active Activated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|GasStationObservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GasStationObservation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GasStationObservation query()
 * @method static \Illuminate\Database\Eloquent\Builder|GasStationObservation whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStationObservation whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStationObservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStationObservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStationObservation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStationObservation wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStationObservation whereUpdatedAt($value)
 */
	class GasStationObservation extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\Hose
 *
 * @property int $id Identifier
 * @property string $name Name
 * @property string $current_seal Current seal
 * @property string|null $color Color name
 * @property int $company_id Company identifier
 * @property int $hose_type_id Hose type identifier
 * @property int $station_id Station identifier
 * @property int $active Activated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inspections\ControlRecordDetail> $controlDetails
 * @property-read int|null $control_details_count
 * @property-read \App\Models\Inspections\HoseType|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|Hose newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hose newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hose query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hose whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hose whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hose whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hose whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hose whereCurrentSeal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hose whereHoseTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hose whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hose whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hose whereStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hose whereUpdatedAt($value)
 */
	class Hose extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\HoseType
 *
 * @property int $id Identifier
 * @property string $name Name
 * @property string $code Code
 * @property string $octane_type Octane type: S=Super, E=Extra/Ecopais, F=Flash point
 * @property string|null $color Color name
 * @property int $active Activated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Inspections\Hose $hose
 * @method static \Illuminate\Database\Eloquent\Builder|HoseType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HoseType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HoseType query()
 * @method static \Illuminate\Database\Eloquent\Builder|HoseType whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HoseType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HoseType whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HoseType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HoseType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HoseType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HoseType whereOctaneType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HoseType whereUpdatedAt($value)
 */
	class HoseType extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\InspectionSetting
 *
 * @property int $id
 * @property string $name
 * @property int|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|InspectionSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InspectionSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InspectionSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|InspectionSetting whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InspectionSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InspectionSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InspectionSetting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InspectionSetting whereUpdatedAt($value)
 */
	class InspectionSetting extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\Location
 *
 * @property int $id
 * @property string $name
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereUpdatedAt($value)
 */
	class Location extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\Measurement
 *
 * @property int $id Identifier
 * @property string $name Name
 * @property int $value Value
 * @property string $color HEX color code
 * @property int $active Activated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $order_measurements
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|Measurement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Measurement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Measurement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Measurement whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Measurement whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Measurement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Measurement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Measurement whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Measurement whereOrderMeasurements($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Measurement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Measurement whereValue($value)
 */
	class Measurement extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\Observation
 *
 * @property int $id Identifier
 * @property string $name Name
 * @property int $priority Priority: 2=HIGH, 1=NORMAL, 0=MINOR
 * @property string $color HEX color code
 * @property int $active Activated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|Observation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Observation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Observation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Observation whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Observation whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Observation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Observation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Observation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Observation wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Observation whereUpdatedAt($value)
 */
	class Observation extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\Region
 *
 * @property int $id Identifier
 * @property string $name Name
 * @property int $company_id Company identifier
 * @property int $active Activated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereUpdatedAt($value)
 */
	class Region extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\Station
 *
 * @property int $id Identifier
 * @property string $name Name
 * @property string $code Code
 * @property int $company_id Company identifier
 * @property int $station_type_id Station type identifier
 * @property int $region_id Region identifier
 * @property float|null $octane_super Default octane value for super
 * @property float|null $octane_extra Default octane value for extra
 * @property float|null $flash_point Default flash point value
 * @property string|null $price_super
 * @property string|null $price_extra
 * @property string|null $price_diesel_1
 * @property string|null $price_diesel_2
 * @property int|null $location_id
 * @property string|null $street
 * @property int $active Activated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float|null $octane_eco_plus
 * @property string|null $price_eco_plus
 * @property string|null $email_customer
 * @property string|null $station_manager_name
 * @property string|null $station_manager_signature
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Inspections\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inspections\Hose> $hoses
 * @property-read int|null $hoses_count
 * @property-read \App\Models\Inspections\Location|null $location
 * @method static \Illuminate\Database\Eloquent\Builder|Station newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station query()
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereEmailCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereFlashPoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereOctaneEcoPlus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereOctaneExtra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereOctaneSuper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station wherePriceDiesel1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station wherePriceDiesel2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station wherePriceEcoPlus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station wherePriceExtra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station wherePriceSuper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereStationManagerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereStationManagerSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereStationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereUpdatedAt($value)
 */
	class Station extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inspections{
/**
 * App\Models\Inspections\StationType
 *
 * @property int $id Identifier
 * @property string $name Name
 * @property int $company_id Company identifier
 * @property int $active Activated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|StationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|StationType whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationType whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StationType whereUpdatedAt($value)
 */
	class StationType extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inventory{
/**
 * App\Models\Inventory\Category
 *
 * @property int $id
 * @property int $company_id
 * @property int $category_type_id
 * @property int|null $parent_id
 * @property string $name
 * @property string|null $description
 * @property string|null $color
 * @property bool|null $is_active
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read Category|null $category
 * @property-read \App\Models\Common\CategoryType $categoryType
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companies
 * @property-read int|null $companies_count
 * @property-read \App\Models\Core\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companyUser
 * @property-read int|null $company_user_count
 * @property-read \App\Models\Persona\User $creator
 * @property-read \App\Models\Persona\User|null $destroyer
 * @property-read \App\Models\Persona\User|null $editor
 * @property-read \App\Models\Core\Company|null $latestCompany
 * @property-read Category|null $parent
 * @property-read \App\Models\Setting\ResourceLock|null $resourceLock
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCategoryTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category withoutTrashed()
 */
	class Category extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Inventory{
/**
 * App\Models\Inventory\Product
 *
 * @property \App\Enums\ItemTypeEnum $type
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Inventory\Category|null $category
 * @property-read \App\Models\Common\CategoryType $categoryType
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companies
 * @property-read int|null $companies_count
 * @property-read \App\Models\Core\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companyUser
 * @property-read int|null $company_user_count
 * @property-read \App\Models\Persona\User $creator
 * @property-read \App\Models\Persona\User $destroyer
 * @property-read \App\Models\Persona\User $editor
 * @property-read \App\Models\Core\Company|null $latestCompany
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \App\Models\Core\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Inventory\Category|null $parent
 * @property-read \App\Models\Setting\ResourceLock|null $resourceLock
 * @property \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inventory\Tag> $tags
 * @property-read int|null $tags_count
 * @property-read \App\Models\Setting\Unit|null $unit
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product withAllTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|Product withAnyTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product withAnyTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product withoutTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product withoutTrashed()
 */
	class Product extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable, \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models\Inventory{
/**
 * App\Models\Inventory\Service
 *
 * @property \App\Enums\ItemTypeEnum $type
 * @property \Illuminate\Database\Eloquent\Casts\ArrayObject $images
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Inventory\Category|null $category
 * @property-read \App\Models\Common\CategoryType $categoryType
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companies
 * @property-read int|null $companies_count
 * @property-read \App\Models\Core\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companyUser
 * @property-read int|null $company_user_count
 * @property-read \App\Models\Persona\User $creator
 * @property-read \App\Models\Persona\User $destroyer
 * @property-read \App\Models\Persona\User $editor
 * @property-read \App\Models\Core\Company|null $latestCompany
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \App\Models\Core\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Inventory\Category|null $parent
 * @property-read \App\Models\Setting\ResourceLock|null $resourceLock
 * @property-read \App\Models\Setting\Unit|null $unit
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Service withoutTrashed()
 */
	class Service extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable, \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models\Inventory{
/**
 * App\Models\Inventory\Tag
 *
 * @property int $id
 * @property int $company_id
 * @property array $name
 * @property array $slug
 * @property string|null $type
 * @property int|null $order_column
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companies
 * @property-read int|null $companies_count
 * @property-read \App\Models\Core\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companyUser
 * @property-read int|null $company_user_count
 * @property-read \App\Models\Persona\User|null $creator
 * @property-read \App\Models\Persona\User|null $destroyer
 * @property-read \App\Models\Persona\User|null $editor
 * @property-read \App\Models\Core\Company|null $latestCompany
 * @property-read \App\Models\Setting\ResourceLock|null $resourceLock
 * @property \Illuminate\Database\Eloquent\Collection<int, Tag> $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Tag containing(string $name, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag ordered(string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag withAllTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag withAnyTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag withAnyTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag withType(?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag withoutTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag withoutTrashed()
 */
	class Tag extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Locale{
/**
 * App\Models\Locale\City
 *
 * @property int $id
 * @property string $name
 * @property int $state_id
 * @property string|null $state_code
 * @property int $country_id
 * @property string|null $country_code
 * @property string|null $latitude
 * @property string|null $longitude
 * @property int|null $flag
 * @property string|null $wiki_data_id Rapid API GeoDB Cities
 * @property bool|null $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereStateCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereWikiDataId($value)
 */
	class City extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Locale{
/**
 * App\Models\Locale\Country
 *
 * @property int $id
 * @property string $name
 * @property string|null $iso3
 * @property string|null $numeric_code
 * @property string|null $iso2
 * @property string|null $phonecode
 * @property string|null $capital
 * @property string|null $currency
 * @property string|null $currency_symbol
 * @property string|null $tld
 * @property string|null $native
 * @property string|null $region
 * @property string|null $subregion
 * @property string|null $timezones
 * @property string|null $translations
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $emoji
 * @property string|null $emoji_u
 * @property int|null $flag
 * @property string|null $wiki_data_id Rapid API GeoDB Cities
 * @property bool|null $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCapital($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCurrencySymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereEmoji($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereEmojiU($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIso2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIso3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereNative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereNumericCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country wherePhonecode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereSubregion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereTimezones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereTld($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereTranslations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereWikiDataId($value)
 */
	class Country extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Locale{
/**
 * App\Models\Locale\Currency
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companies
 * @property-read int|null $companies_count
 * @property-read \App\Models\Core\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companyUser
 * @property-read int|null $company_user_count
 * @property-read \App\Models\Persona\User $creator
 * @property-read \App\Models\Persona\User $destroyer
 * @property-read \App\Models\Persona\User $editor
 * @property-read \App\Models\Core\Company|null $latestCompany
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency withoutTrashed()
 */
	class Currency extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\Locale{
/**
 * App\Models\Locale\State
 *
 * @property int $id
 * @property string $name
 * @property int $country_id
 * @property string|null $country_code
 * @property string|null $fips_code
 * @property string|null $iso2
 * @property string|null $type
 * @property string|null $latitude
 * @property string|null $longitude
 * @property int|null $flag
 * @property string|null $wiki_data_id Rapid API GeoDB Cities
 * @property bool|null $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|State query()
 * @method static \Illuminate\Database\Eloquent\Builder|State whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereFipsCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereIso2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereWikiDataId($value)
 */
	class State extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models\LogChecks{
/**
 * App\Models\LogChecks\AuthenticationLog
 *
 * @property int $id
 * @property string $authenticatable_type
 * @property int $authenticatable_id
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property \Illuminate\Support\Carbon|null $login_at
 * @property bool $login_successful
 * @property \Illuminate\Support\Carbon|null $logout_at
 * @property bool $cleared_by_user
 * @property array|null $location
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $authenticatable
 * @method static \Illuminate\Database\Eloquent\Builder|AuthenticationLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthenticationLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthenticationLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthenticationLog whereAuthenticatableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthenticationLog whereAuthenticatableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthenticationLog whereClearedByUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthenticationLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthenticationLog whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthenticationLog whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthenticationLog whereLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthenticationLog whereLoginSuccessful($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthenticationLog whereLogoutAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthenticationLog whereUserAgent($value)
 */
	class AuthenticationLog extends \Eloquent {}
}

namespace App\Models\Persona{
/**
 * App\Models\Persona\Customer
 *
 * @property \App\Enums\PersonaTypeEnum $persona_type
 * @property \App\Enums\IdentificationTypeEnum $identification_type
 * @property mixed $password
 * @property \App\Enums\TypePersonEnum $type_person
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Rappasoft\LaravelAuthenticationLog\Models\AuthenticationLog> $authentications
 * @property-read int|null $authentications_count
 * @property-read \App\Models\Inventory\Category|null $category
 * @property-read \App\Models\Common\CategoryType $categoryType
 * @property-read \App\Models\Locale\City|null $city
 * @property-read Customer|null $client
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companies
 * @property-read int|null $companies_count
 * @property-read \App\Models\Core\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companyUser
 * @property-read int|null $company_user_count
 * @property-read \App\Models\Locale\Country $country
 * @property-read \App\Models\Persona\User $creator
 * @property-read Customer|null $customer
 * @property-read \App\Models\Persona\User $destroyer
 * @property-read \App\Models\Persona\User $editor
 * @property-read \App\Models\Persona\User|null $employee
 * @property-read \Rappasoft\LaravelAuthenticationLog\Models\AuthenticationLog|null $latestAuthentication
 * @property-read \App\Models\Core\Company|null $latestCompany
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Inventory\Category|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \App\Models\Setting\ResourceLock|null $resourceLock
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \App\Models\Persona\User|null $salesperson
 * @property-read \App\Models\Locale\State $state
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer onlyCreatedByMe()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer withoutRole($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer withoutTrashed()
 */
	class Customer extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable, \Filament\Models\Contracts\FilamentUser, \Filament\Models\Contracts\HasTenants, \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

namespace App\Models\Persona{
/**
 * App\Models\Persona\User
 *
 * @property int $id
 * @property int|null $company_id
 * @property string $user_id
 * @property string|null $main_user_id
 * @property \App\Enums\IdentificationTypeEnum|null $identification_type Tipo de identificación: RUC, Cédula, Pasaporte, Identificación del exterior
 * @property string|null $identification_number
 * @property \App\Enums\PersonaTypeEnum|null $persona_type
 * @property string $name
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property string|null $telephone
 * @property string|null $address
 * @property string|null $notes
 * @property \App\Enums\GenderEnum|null $gender
 * @property \Illuminate\Support\Carbon|null $date_birth
 * @property \Illuminate\Support\Carbon|null $date_hired
 * @property int|null $department_id
 * @property int|null $country_id
 * @property int|null $state_id
 * @property int|null $city_id
 * @property string|null $parish
 * @property string|null $chart_of_account_number
 * @property string|null $signature
 * @property int|null $category_id
 * @property bool|null $main_subscribe_user
 * @property bool|null $is_imported
 * @property bool|null $is_user_logout
 * @property bool|null $is_allowed_to_login
 * @property bool|null $is_super
 * @property bool|null $is_active
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $virtual_name_identification_number
 * @property string|null $virtual_user_id_name
 * @property string|null $theme
 * @property string|null $theme_color
 * @property string|null $avatar_url
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Rappasoft\LaravelAuthenticationLog\Models\AuthenticationLog> $authentications
 * @property-read int|null $authentications_count
 * @property-read \App\Models\Inventory\Category|null $category
 * @property-read \App\Models\Common\CategoryType $categoryType
 * @property-read \App\Models\Locale\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companies
 * @property-read int|null $companies_count
 * @property-read \App\Models\Core\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companyUser
 * @property-read int|null $company_user_count
 * @property-read \App\Models\Locale\Country|null $country
 * @property-read User|null $creator
 * @property-read \App\Models\Core\Department|null $department
 * @property-read User|null $destroyer
 * @property-read User|null $editor
 * @property-read \Rappasoft\LaravelAuthenticationLog\Models\AuthenticationLog|null $latestAuthentication
 * @property-read \App\Models\Core\Company|null $latestCompany
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Inventory\Category|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \App\Models\Setting\ResourceLock|null $resourceLock
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inventory\Tag> $tags
 * @property-read \App\Models\Locale\State|null $state
 * @property-read int|null $tags_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatarUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereChartOfAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDateBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDateHired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIdentificationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIdentificationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAllowedToLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsImported($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsSuper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsUserLogout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMainSubscribeUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMainUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereParish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePersonaType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTheme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereThemeColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVirtualNameIdentificationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVirtualUserIdName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withAllTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|User withAnyTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User withAnyTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTags(\ArrayAccess|\Spatie\Tags\Tag|array|string $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 */
	class User extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable, \Filament\Models\Contracts\FilamentUser, \Filament\Models\Contracts\HasAvatar, \Filament\Models\Contracts\HasDefaultTenant, \Filament\Models\Contracts\HasTenants, \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

namespace App\Models\Setting{
/**
 * App\Models\Setting\ResourceLock
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companies
 * @property-read int|null $companies_count
 * @property-read \App\Models\Core\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companyUser
 * @property-read int|null $company_user_count
 * @property-read \App\Models\Core\Company|null $latestCompany
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $lockable
 * @property-read \App\Models\Persona\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceLock query()
 */
	class ResourceLock extends \Eloquent {}
}

namespace App\Models\Setting{
/**
 * App\Models\Setting\Unit
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companies
 * @property-read int|null $companies_count
 * @property-read \App\Models\Core\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Core\Company> $companyUser
 * @property-read int|null $company_user_count
 * @property-read \App\Models\Persona\User $creator
 * @property-read \App\Models\Persona\User $destroyer
 * @property-read \App\Models\Persona\User $editor
 * @property-read \App\Models\Core\Company|null $latestCompany
 * @property-read \App\Models\Setting\ResourceLock|null $resourceLock
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit withoutTrashed()
 */
	class Unit extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

