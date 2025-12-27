<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\MediaTypes\Enums;

enum MediaTypeRelationshipsEnum: string
{
    case MEDIA_CATALOGS = 'mediaCatalogs';
    case MEDIA_REVIEWS = 'mediaReviews';
}
