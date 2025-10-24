<?php

namespace Domain\Inserts\OpticalEffectStones\Enums;

enum OpticalEffectStoneEnum: string
{
    case TYPE_RESOURCE     = 'opticalEffectStones';
    case TABLE_NAME        = 'jw_inserts.optical_effect_stone';
    case PRIMARY_KEY       = 'id';
    case FK_OPTICAL_EFFECT = 'optical_effect_id';
}
