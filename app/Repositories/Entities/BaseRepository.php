<?php

namespace App\Repositories\Entities;

use App\Contracts\Repositories\Entities\Repository;
use App\Traits\SpatieQueryBuilder;

abstract class BaseRepository implements Repository
{
    use SpatieQueryBuilder;

    public function __construct()
    {
        $this->model = app($this->model());
    }

    public function get(?array $with = [])
    {
        return $this->makeQueryBuilder($with)->paginate();
    }

    public function find($id, ?array $with = [])
    {
        return $this->makeQueryBuilder($with)->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->query()->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->find($id)->delete();
    }
}
