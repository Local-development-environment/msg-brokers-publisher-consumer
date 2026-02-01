<?php

namespace Domain\Stones\OpticalEffects\Enums;

enum OpticalEffectEnum: string
{
    case TYPE_RESOURCE = 'opticalEffects';
    case TABLE_NAME    = 'jw_stones.optical_effects';
    case PRIMARY_KEY   = 'id';
}
