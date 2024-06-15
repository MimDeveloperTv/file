<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\QueryBuilder;

trait SpatieQueryBuilder
{
    protected QueryBuilder $queryBuilder;

    protected Model $model;

    protected array $defaultSort = ['-id'];

    public function makeQueryBuilder(?array $with = []): QueryBuilder
    {
        $this->queryBuilder = QueryBuilder::for($this->model)
            ->with($with)
            ->allowedFilters($this->allowedFilters())
            ->allowedIncludes($this->allowedIncludes())
            ->defaultSort($this->defaultSort);

        return $this->queryBuilder;
    }

    abstract protected function allowedFilters(): array;

    abstract protected function allowedIncludes(): array;

    abstract protected function model(): string;
}
