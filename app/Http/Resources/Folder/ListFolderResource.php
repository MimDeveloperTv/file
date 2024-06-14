<?php

namespace App\Http\Resources\Folder;

use Illuminate\Http\Resources\Json\JsonResource;

class ListFolderResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sub_folders' => $this->children,
        ];
    }
}
