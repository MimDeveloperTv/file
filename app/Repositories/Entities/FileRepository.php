<?php

namespace App\Repositories\Entities;

use App\Contracts\Repositories\Entities\FileRepository as FileContract;
use App\Models\File;
use Spatie\QueryBuilder\AllowedFilter;

class FileRepository extends BaseRepository implements FileContract
{
    protected function model(): string
    {
        return File::class;
    }

    protected function allowedFilters(): array
    {
        return [
            AllowedFilter::exact('name'),
            AllowedFilter::exact('type'),
            AllowedFilter::exact('path'),
            AllowedFilter::exact('folder_id'),
            AllowedFilter::exact('size'),
        ];
    }

    protected function allowedIncludes(): array
    {
        return [];
    }

    public function updateByFolderId(array $data, $folderId)
    {
        return $this->model->query()
            ->where('folder_id', $folderId)
            ->update($data);
    }
}
