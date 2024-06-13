<?php

namespace App\Http\Requests\Folder;

use Illuminate\Foundation\Http\FormRequest;

class CreateFolderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|required|max:10',
            'parent_id' => 'int|nullable|exists:folders,id'
        ];
    }

    public function getData()
    {
        return [
            'name' => $this->get('name'),
            'parent_id' => $this->get('parent_id'),
        ];
    }
}
