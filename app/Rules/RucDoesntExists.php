<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class RucDoesntExists implements Rule
{
    protected string $model;

    protected string $column;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $model, string $column = 'ruc')
    {
        $this->model = $model;
        $this->column = $column;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     */
    public function passes($attribute, $value): bool
    {
        if (empty($this->model)) {
            return false;
        }

        return DB::table((new $this->model)->getModel()->getTable())
            ->whereNull('deleted_at')
            ->where('company_id', '=', auth()->user()->getAttributeValue('company_id'))
            ->where('created_by', '<>', auth()->id())
            ->where($this->column, '=', $value)
            ->exists();

        /*return (new $this->model)
            ->withoutGlobalScope(CreatedByScope::class)
            ->where($this->column, '=', $value)
            ->exists();*/
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return (string) __('Ruc doesn\'t exists in our records');
    }
}
