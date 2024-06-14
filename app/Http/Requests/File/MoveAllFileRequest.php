<?php

namespace App\Http\Requests\File;

use Illuminate\Foundation\Http\FormRequest;

class MoveAllFileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'from_folder_id' => 'required|int|exists:folders,id',
            'to_folder_id' => 'required|int|exists:folders,id',
        ];
    }

    public function fromFolder()
    {
        return $this->get('from_folder_id');
    }

    public function toFolder()
    {
        return $this->get('to_folder_id');
    }
}
