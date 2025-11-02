<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\Videos\Enums;

enum VideoEnum: string
{
    case TYPE_RESOURCE = 'videos';
    case TABLE_NAME    = 'jw_medias.videos';
    case PRIMARY_KEY   = 'id';
    case FK_JEWELLERY  = 'jewellery_id';
    case FK_PRODUCER   = 'producer_id';
}
