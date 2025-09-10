<?php

namespace Domain\Inserts\Stones\Enums;

enum StoneRelationshipsEnum: string
{
    case TYPE_ORIGIN = 'typeOrigin';
    case IMITATION_STONE = 'imitationStone';
    case GROWN_STONE = 'grownStone';
    case NATURAL_STONE = 'naturalStone';
    case INSERT_STONES = 'insertStones';
    case OPTICAL_EFFECT_STONE = 'opticalEffectStone';
}
