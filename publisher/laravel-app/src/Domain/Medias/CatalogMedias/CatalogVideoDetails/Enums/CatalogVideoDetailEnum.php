<?php

declare(strict_types=1);

namespace Domain\Medias\CatalogMedias\CatalogVideoDetails\Enums;

enum CatalogVideoDetailEnum: string
{
    case TYPE_RESOURCE = 'catalogVideoDetails';
    case TABLE_NAME    = 'jw_medias.catalog_video_details';
    case PRIMARY_KEY   = 'id';
    case FK_VIDEO_TYPE    = 'video_type_id';
    case FK_CATALOG_VIDEO = 'catalog_video_id';
}
