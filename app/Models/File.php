<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\QueryBuilder\AllowedFilter;

class File extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'path',
        'folder_id',
        'size'
    ];

    public function folder(): BelongsTo
    {
        return $this->belongsTo(Folder::class);
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
}
