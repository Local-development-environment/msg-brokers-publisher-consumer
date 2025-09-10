<?php

namespace Domain\Inserts\OpticalEffectStones\Enums;

enum OpticalEffectStoneEnum: string
{
    case RESOURCE          = 'opticalEffectStones';
    case TABLE             = 'jw_inserts.optical_effect_stone';
    case PRIMARY_KEY       = 'id';
    case FK_STONES         = 'stone_id';
    case FK_OPTICAL_EFFECT = 'optical_effect_id';
}
