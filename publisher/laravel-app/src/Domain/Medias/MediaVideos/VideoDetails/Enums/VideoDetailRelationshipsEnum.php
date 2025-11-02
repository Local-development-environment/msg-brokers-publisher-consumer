<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\VideoDetails\Enums;

enum VideoDetailRelationshipsEnum: string
{
    case VIDEO      = 'video';
    case VIDEO_TYPE = 'videoType';
}
