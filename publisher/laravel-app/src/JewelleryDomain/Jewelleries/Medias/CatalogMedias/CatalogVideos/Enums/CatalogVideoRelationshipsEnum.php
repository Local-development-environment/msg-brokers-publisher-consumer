<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogVideos\Enums;

enum CatalogVideoRelationshipsEnum: string
{
    case CATALOG_MEDIA         = 'catalogMedia';
    case CATALOG_VIDEO_DETAILS = 'catalogVideoDetails';
}
