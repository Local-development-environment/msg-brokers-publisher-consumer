<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\TieClips\TieClips\Enums;

enum TieClipEnum: string
{
    case TYPE_RESOURCE = 'tieClips';
    case TABLE_NAME    = 'jw_properties.tie_clips';
    case PRIMARY_KEY   = 'id';
}
