<?php

namespace App\Observers;

use App\Enums\FileType;
use App\Models\File;

class FileObserver
{
    public function creating(File $file)
    {

        $mimeType = $file->offsetGet('type');

        if (str_starts_with($mimeType, 'image/')) {
            $file->type = FileType::IMAGE->value;
        } elseif (str_starts_with($mimeType, 'video/')) {
            $file->type = FileType::VIDEO->value;
        } elseif (str_starts_with($mimeType, 'audio/')) {
            $file->type = FileType::AUDIO->value;
        } else {
            $file->type = FileType::DOCUMENT->value;
        }
    }
}
