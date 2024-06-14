<?php

namespace App\Models\Query;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class FilterUploadDateFile implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $value)) {

            $query->with(['files' => function ($query) use ($value) {
                $query->whereDate('created_at', $value);
            }]);
        }
    }
}
