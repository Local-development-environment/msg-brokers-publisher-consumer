<?php

namespace Domain\Inserts\OpticalEffects\Enums;

enum OpticalEffectEnum: string
{
    case RESOURCE      = 'opticalEffects';
    case TABLE         = 'jw_inserts.optical_effects';
    case PRIMARY_KEY   = 'id';
    case FK_STONES     = 'stone_id';
}
