<?php

namespace App\Http\Resources\Folder;

use Illuminate\Http\Resources\Json\JsonResource;

class CreateFolderResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'parent_folder_id' => $this->parent_id,
        ];
    }
}
