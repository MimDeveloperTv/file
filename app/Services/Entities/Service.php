<?php

namespace App\Services\Entities;

use App\Repositories\Entities\BaseRepository;

abstract class Service
{
    protected BaseRepository $repository;

    public function __construct()
    {
        $this->repository = $this->repository();
    }

    abstract protected function repository(): mixed;

    public function get(?array $with = [])
    {
        return $this->repository->get($with);
    }

    public function find($id, ?array $with = [])
    {
        return $this->repository->find($id, $with);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->repository->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}
