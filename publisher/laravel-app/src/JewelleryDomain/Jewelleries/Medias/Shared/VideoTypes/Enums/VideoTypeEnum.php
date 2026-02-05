<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Enums;

enum VideoTypeEnum: string
{
    case TYPE_RESOURCE = 'videoTypes';
    case TABLE_NAME    = 'jw_medias.video_types';
    case PRIMARY_KEY   = 'id';
}
