<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\VideoDetails\Enums;

enum VideoDetailEnum: string
{
    case TYPE_RESOURCE = 'videoDetails';
    case TABLE_NAME    = 'jw_medias.video_details';
    case PRIMARY_KEY   = 'id';
    case FK_VIDEO_TYPE = 'video_type_id';
    case FK_VIDEO      = 'video_id';
}
