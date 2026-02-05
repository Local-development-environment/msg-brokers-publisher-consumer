<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogMedias\Enums;

enum CatalogMediaRelationshipsEnum: string
{
    case JEWELLERY = 'jewellery';
    case MEDIA_TYPE = 'mediaType';
    case CATALOG_VIDEO = 'catalogVideo';
    case CATALOG_PICTURE = 'catalogPicture';
}
