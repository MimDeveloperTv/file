<?php

namespace App\Models;

use App\Models\Query\ShowTrashedFile;
use App\Traits\SpatieQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;

class Folder extends Model
{
    use HasFactory,
        SpatieQueryBuilder;

    public $timestamps = false;

    protected $fillable = ['name', 'parent_id'];

    protected function allowedFilters(): array
    {
        return [
            AllowedFilter::exact('name'),
            AllowedFilter::exact('parent_id'),
        ];
    }

    protected function allowedIncludes(): array
    {
        return [
            AllowedInclude::custom('trashed',new ShowTrashedFile),
        ];
    }

    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }

    public function parent()
    {
        return $this->belongsTo(Folder::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Folder::class, 'parent_id');
    }

}
