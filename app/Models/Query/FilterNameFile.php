<?php

namespace App\Models\Query;

use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class FilterNameFile implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->with(['files' => function ($query) use ($value) {
            $query->where('name', $value);
        }]);

    }
}
