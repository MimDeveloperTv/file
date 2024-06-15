<?php

namespace App\Contracts\Repositories\Entities;

interface Repository
{
    public function get(?array $with = []);

    public function find($id, ?array $with = []);

    public function create(array $data);

    public function update(array $data, $id);

    public function destroy($id);
}
