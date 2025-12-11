<?php

declare(strict_types=1);

namespace Domain\Medias\MediaVideos\VideoTypes\Enums;

enum VideoTypeBuilderEnum: string
{
    case OGV = 'video/ogv';
    case WEBM = 'video/webm';
    case MP4 = 'video/mp4';

    public function extension(): string
    {
        return match ($this) {
            self::OGV  => 'ogv',
            self::WEBM => 'webm',
            self::MP4  => 'mp4',

        };
    }
}
