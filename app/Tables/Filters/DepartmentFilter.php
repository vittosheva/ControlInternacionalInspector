<?php

namespace App\Tables\Filters;

use App\Models\Core\Department;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class DepartmentFilter extends Filter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Brand'))
            ->form([
                SelectTree::make('department_id')
                    ->label(__('Department'))
                    ->relationship('department', 'name', 'parent_id')
                    ->independent(false)
                    ->enableBranchNode(),
            ])
            ->query(function (Builder $query, array $data) {
                return $query->when(! empty($data['department_id']), function ($query) use ($data) {
                    return $query->where('department_id', '=', $data['department_id']);
                });
            })
            ->indicateUsing(function (array $data): ?string {
                if (empty($data['department_id'])) {
                    return null;
                }

                return __('Department').': '.implode(', ', Department::query()
                    ->where('id', '=', $data['department_id'])
                    ->pluck('name', 'id')
                    ->toArray());
            });
    }
}
