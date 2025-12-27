<?php

declare(strict_types=1);

namespace Domain\Medias\MediaCatalog\MediaCatalog\Enums;

enum MediaCatalogEnum: string
{
    case TYPE_RESOURCE = 'mediaCatalogs';
    case TABLE_NAME    = 'jw_medias.media_catalogs';
    case PRIMARY_KEY   = 'id';
    case FK_JEWELLERY  = 'jewellery_id';
    case FK_MEDIA_TYPE = 'media_type_id';
}
