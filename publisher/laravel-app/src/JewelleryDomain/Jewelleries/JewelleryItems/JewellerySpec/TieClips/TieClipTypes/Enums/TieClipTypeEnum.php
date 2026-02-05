<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClipTypes\Enums;

enum TieClipTypeEnum: string
{
    case TYPE_RESOURCE = 'tieClipTypes';
    case TABLE_NAME    = 'jw_properties.tie_clip_types';
    case PRIMARY_KEY   = 'id';
}
