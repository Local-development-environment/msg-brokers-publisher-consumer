<?php

namespace Domain\Inserts\ImitationStones\Enums;

enum ImitationStoneEnum: string
{
    case TYPE_RESOURCE = 'imitationStones';
    case TABLE_NAME    = 'jw_inserts.imitation_stones';
    case PRIMARY_KEY   = 'jw_inserts.imitation_stones.id';
    case FK_STONES     = 'jw_inserts.imitation_stones.stone_id';
}
