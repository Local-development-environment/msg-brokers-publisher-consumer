<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogVideos\Enums;

enum CatalogVideoEnum: string
{
    case TYPE_RESOURCE = 'catalogVideos';
    case TABLE_NAME    = 'jw_medias.catalog_videos';
    case PRIMARY_KEY   = 'id';
}
