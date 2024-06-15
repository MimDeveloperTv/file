<?php

namespace App\Services\Entities;

use App\Contracts\Repositories\Entities\FileRepository;

class FileService extends Service
{
    protected function repository(): FileRepository
    {
        return app(FileRepository::class);
    }

    public function updateByFolderId(array $data, $folderId)
    {
        return $this->repository->updateByFolderId($data, $folderId);
    }
}
