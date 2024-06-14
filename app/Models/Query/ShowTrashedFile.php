<?php


namespace App\Models\Query;

use Illuminate\Database\Eloquent\Builder;

class ShowTrashedFile implements \Spatie\QueryBuilder\Includes\IncludeInterface
{
    public function __invoke(Builder $query, string $include)
    {
        $query->with(['files' => function ($query) {
            $query->onlyTrashed();
        }]);
    }
}
