<?php

namespace App\Models\Query;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class FilterNameFile implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->with(['files' => function ($query) use ($value) {
            $query->where('name', 'like', '%'.$value.'%');
        }]);

    }
}
