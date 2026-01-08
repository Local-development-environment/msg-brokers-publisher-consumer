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

    case RELATED_TO_CATALOG_MEDIAS      = 'media-type.catalog-medias';
    case RELATIONSHIP_TO_CATALOG_MEDIAS = 'media-type.relationships.catalog-medias';
    case RELATED_TO_REVIEW_MEDIAS       = 'media-type.review-medias';
    case RELATIONSHIP_TO_REVIEW_MEDIAS  = 'media-type.relationships.review-medias';
}
