<?php

namespace App\Http\Requests\File;

use Illuminate\Foundation\Http\FormRequest;

class MoveFileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'folder_id' => 'required|int|exists:folders,id',
        ];
    }

    public function getData()
    {
        return [
            'folder_id' => $this->get('folder_id'),
        ];
    }
}
