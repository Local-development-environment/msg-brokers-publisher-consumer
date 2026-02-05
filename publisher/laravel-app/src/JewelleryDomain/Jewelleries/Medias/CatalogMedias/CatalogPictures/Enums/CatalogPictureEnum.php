<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogPictures\Enums;

enum CatalogPictureEnum: string
{
    case TYPE_RESOURCE = 'catalogPictures';
    case TABLE_NAME    = 'jw_medias.catalog_pictures';
    case PRIMARY_KEY   = 'id';
}
