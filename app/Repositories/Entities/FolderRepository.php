<?php

namespace App\Repositories\Entities;

use App\Contracts\Repositories\Entities\FolderRepository as FolderContract;
use App\Models\Folder;
use App\Models\Query\FilterNameFile;
use App\Models\Query\FilterUploadDateFile;
use App\Models\Query\ShowTrashedFile;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;

class FolderRepository extends BaseRepository implements FolderContract
{
    protected function model(): string
    {
        return Folder::class;
    }

    protected function allowedFilters(): array
    {
        return [
            AllowedFilter::exact('name'),
            AllowedFilter::exact('parent_id'),
            AllowedFilter::custom('file_name', new FilterNameFile),
            AllowedFilter::custom('created_at', new FilterUploadDateFile),
        ];
    }

    protected function allowedIncludes(): array
    {
        return [
            AllowedInclude::custom('trashed', new ShowTrashedFile),
        ];
    }
}
