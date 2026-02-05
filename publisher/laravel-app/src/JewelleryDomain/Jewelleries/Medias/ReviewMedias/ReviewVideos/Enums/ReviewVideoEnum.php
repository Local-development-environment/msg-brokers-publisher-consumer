<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewVideos\Enums;

enum ReviewVideoEnum: string
{
    case TYPE_RESOURCE = 'reviewVideos';
    case TABLE_NAME    = 'jw_medias.review_videos';
    case PRIMARY_KEY   = 'id';
}
