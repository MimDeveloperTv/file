<?php

namespace App\Contracts\Repositories\Entities;

interface FileRepository extends Repository
{
    public function updateByFolderId(array $data, $folderId);
}
