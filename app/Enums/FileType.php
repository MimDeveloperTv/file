<?php

namespace App\Enums;

enum FileType: string
{
    use EnumHelper;

    case DOCUMENT = 'document';
    case IMAGE = 'image';
    case VIDEO = 'video';
    case AUDIO = 'audio';
}
