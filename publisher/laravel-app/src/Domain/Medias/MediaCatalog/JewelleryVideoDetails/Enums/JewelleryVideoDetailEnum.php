<?php

declare(strict_types=1);

namespace Domain\Medias\MediaCatalog\JewelleryVideoDetails\Enums;

enum JewelleryVideoDetailEnum: string
{
    case TYPE_RESOURCE = 'jewelleryVideoDetails';
    case TABLE_NAME    = 'jw_medias.jewellery_video_details';
    case PRIMARY_KEY   = 'id';
    case FK_VIDEO_TYPE  = 'video_type_id';
    case FK_JEWELLERY_VIDEO = 'jewellery_video_id';
}
