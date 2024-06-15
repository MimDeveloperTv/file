<?php

namespace App\Services\Entities;

use App\Contracts\Repositories\Entities\FolderRepository;

class FolderService extends Service
{
    protected function repository(): FolderRepository
    {
        return app(FolderRepository::class);
    }
}
