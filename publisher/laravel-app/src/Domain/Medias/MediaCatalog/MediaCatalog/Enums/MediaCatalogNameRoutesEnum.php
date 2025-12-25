<?php

declare(strict_types=1);

namespace Domain\Medias\MediaCatalog\MediaCatalog\Enums;

enum MediaCatalogNameRoutesEnum: string
{
    case CRUD_INDEX  = 'media-catalogs.index';
    case CRUD_SHOW   = 'media-catalogs.show';
    case CRUD_POST   = 'media-catalogs.post';
    case CRUD_PATCH  = 'media-catalogs.patch';
    case CRUD_DELETE = 'media-catalogs.delete';

    case RELATED_TO_JEWELLERY       = 'media-catalogs.jewellery';
    case RELATIONSHIP_TO_JEWELLERY  = 'media-catalogs.relationships.jewellery';
    case RELATED_TO_MEDIA_TYPE      = 'media-catalogs.media-type';
    case RELATIONSHIP_TO_MEDIA_TYPE = 'media-catalogs.relationships.media-type';
}
