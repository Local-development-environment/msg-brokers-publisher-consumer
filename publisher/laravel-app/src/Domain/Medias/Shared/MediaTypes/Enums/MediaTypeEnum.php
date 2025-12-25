<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\MediaTypes\Enums;

enum MediaTypeEnum: string
{
    case TYPE_RESOURCE = 'mediaTypes';
    case TABLE_NAME    = 'jw_medias.media_types';
    case PRIMARY_KEY   = 'id';
}
