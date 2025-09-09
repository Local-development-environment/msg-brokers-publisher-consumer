<?php

namespace Domain\Inserts\ImitationStones\Enums;

enum ImitationStoneEnum: string
{
    case RESOURCE = 'imitationStones';
    case TABLE = 'jw_inserts.imitation_stones';
    case PRIMARY_KEY   = 'jw_inserts.imitation_stones.id';
    case FK_STONES     = 'jw_inserts.imitation_stones.stone_id';
}
