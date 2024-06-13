<?php

namespace App\Http\Requests\File;

use Illuminate\Foundation\Http\FormRequest;

class CreateFileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx,mp4,mp3|max:20480',
            'folder_id' => 'required|int|exists:folders,id',
        ];
    }

    public function getData()
    {
        $file = $this->file('file');

        return [
            'file' => $file,
            'name' => $file->getClientOriginalName(),
            'path' => $file->store('files'),
            'type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'folder_id' => $this->get('folder_id'),
        ];
    }
}
