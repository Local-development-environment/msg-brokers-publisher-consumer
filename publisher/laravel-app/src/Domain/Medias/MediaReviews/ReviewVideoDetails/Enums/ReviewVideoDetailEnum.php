<?php

declare(strict_types=1);

namespace Domain\Medias\MediaReviews\ReviewVideoDetails\Enums;

enum ReviewVideoDetailEnum: string
{
    case TYPE_RESOURCE = 'reviewVideoDetails';
    case TABLE_NAME    = 'jw_medias.review_video_details';
    case PRIMARY_KEY   = 'id';
}
