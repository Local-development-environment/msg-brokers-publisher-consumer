<?php

namespace Domain\Inserts\OpticalEffects\Enums;

enum OpticalEffectEnum: string
{
    case TYPE_RESOURCE = 'opticalEffects';
    case TABLE_NAME    = 'jw_inserts.optical_effects';
    case PRIMARY_KEY   = 'id';
}
