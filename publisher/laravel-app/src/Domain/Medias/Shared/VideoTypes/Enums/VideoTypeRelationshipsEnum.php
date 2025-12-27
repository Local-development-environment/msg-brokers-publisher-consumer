<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\VideoTypes\Enums;

enum VideoTypeRelationshipsEnum: string
{
    case REVIEW_VIDEO_DETAILS  = 'reviewVideoDetails';
    case CATALOG_VIDEO_DETAILS = 'catalogVideoDetails';
}
