<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneOpticalEffects\Enums;

enum StoneOpticalEffectEnum: string
{
    case TYPE_RESOURCE    = 'stoneOpticalEffects';
    case TABLE_NAME       = 'jw_inserts.stone_optical_effects';
    case PRIMARY_KEY      = 'id';
    case FK_OPTICAL_EFFECT   = 'optical_effect_id';
}
