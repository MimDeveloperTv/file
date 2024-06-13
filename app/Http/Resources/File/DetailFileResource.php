<?php

namespace App\Http\Resources\File;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailFileResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'file_name' => $this->name,
            'file_type' => $this->type,
            'file_path' => $this->path,
            'file_size' => $this->size,
            'folder_id' => $this->folder_id,
        ];
    }
}
