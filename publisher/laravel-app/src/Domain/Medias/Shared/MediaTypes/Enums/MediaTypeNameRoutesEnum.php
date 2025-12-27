<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\MediaTypes\Enums;

enum MediaTypeNameRoutesEnum: string
{
    case CRUD_INDEX  = 'media-types.index';
    case CRUD_SHOW   = 'media-types.show';
    case CRUD_POST   = 'media-types.post';
    case CRUD_PATCH  = 'media-types.patch';
    case CRUD_DELETE = 'media-types.delete';

    case RELATED_TO_MEDIA_CATALOGS      = 'media-type.media-catalogs';
    case RELATIONSHIP_TO_MEDIA_CATALOG = 'media-type.relationships.media-catalogs';
    case RELATED_TO_MEDIA_REVIEWS      = 'media-type.media-reviews';
    case RELATIONSHIP_TO_MEDIA_REVIEWS = 'media-type.relationships.media-reviews';
}
