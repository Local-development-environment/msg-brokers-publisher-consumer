<?php

namespace JewelleryDomain\Jewelleries\Stones\StoneImitations\Enums;

enum StoneImitationEnum: string
{
    case TYPE_RESOURCE = 'stoneImitations';
    case TABLE_NAME    = 'jw_stones.stone_imitations';
    case PRIMARY_KEY   = 'id';
}
