<?php

declare(strict_types=1);

namespace Domain\Medias\MediaCatalog\JewelleryVideos\Enums;

enum JewelleryVideoEnum: string
{
    case TYPE_RESOURCE = 'jewelleryVideos';
    case TABLE_NAME    = 'jw_medias.jewellery_videos';
    case PRIMARY_KEY   = 'id';
}
