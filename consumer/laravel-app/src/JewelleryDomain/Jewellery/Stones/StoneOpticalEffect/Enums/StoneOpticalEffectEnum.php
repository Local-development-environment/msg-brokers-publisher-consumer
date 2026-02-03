<?php

namespace JewelleryDomain\Jewellery\Stones\StoneOpticalEffect\Enums;

enum StoneOpticalEffectEnum: string
{
    case TYPE_RESOURCE = 'stoneOpticalEffects';
    case TABLE_NAME    = 'jw_stones.stone_optical_effects';
    case PRIMARY_KEY   = 'id';
}
