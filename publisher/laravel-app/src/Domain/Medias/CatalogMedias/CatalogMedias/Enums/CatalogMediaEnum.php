<?php

declare(strict_types=1);

namespace Domain\Medias\CatalogMedias\CatalogMedias\Enums;

enum CatalogMediaEnum: string
{
    case TYPE_RESOURCE = 'catalogMedias';
    case TABLE_NAME    = 'jw_medias.catalog_medias';
    case PRIMARY_KEY   = 'id';
    case FK_JEWELLERY  = 'jewellery_id';
    case FK_MEDIA_TYPE = 'media_type_id';
}
