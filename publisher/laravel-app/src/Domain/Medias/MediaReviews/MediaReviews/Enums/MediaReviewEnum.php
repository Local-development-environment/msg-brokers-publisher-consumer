<?php

declare(strict_types=1);

namespace Domain\Medias\MediaReviews\MediaReviews\Enums;

enum MediaReviewEnum: string
{
    case TYPE_RESOURCE = 'mediaReviews';
    case TABLE_NAME    = 'jw_medias.media_reviews';
    case PRIMARY_KEY   = 'id';
    case FK_JEWELLERY  = 'jewellery_id';
    case FK_MEDIA_TYPE = 'media_type_id';
}
