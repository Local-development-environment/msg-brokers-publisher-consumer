<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewVideos\Enums;

enum ReviewVideoRelationshipsEnum: string
{
    case REVIEW_MEDIA         = 'reviewMedia';
    case REVIEW_VIDEO_DETAILS = 'reviewVideoDetails';
}
