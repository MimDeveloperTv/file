<?php

namespace App\Traits;

use Spatie\QueryBuilder\QueryBuilder;

trait SpatieQueryBuilder
{
    protected QueryBuilder $queryBuilder;

    protected array $defaultSort = ['-id'];

    public function makeQueryBuilder(): QueryBuilder
    {
        $this->queryBuilder = QueryBuilder::for(static::class)
            ->allowedFilters($this->allowedFilters())
            ->allowedIncludes($this->allowedIncludes())
            ->defaultSort($this->defaultSort);

        if (property_exists($this, 'with')) {
            $this->queryBuilder->with($this->with);
        }

        return $this->queryBuilder;
    }

    abstract protected function allowedFilters(): array;
    abstract protected function allowedIncludes(): array;
}
