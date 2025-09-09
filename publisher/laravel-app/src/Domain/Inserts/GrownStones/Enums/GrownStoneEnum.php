<?php

namespace Domain\Inserts\GrownStones\Enums;

enum GrownStoneEnum: string
{
    case RESOURCE = 'grownStones';
    case TABLE = 'jw_inserts.grown_stones';
    case PRIMARY_KEY   = 'jw_inserts.grown_stones.id';
    case FK_STONES     = 'jw_inserts.grown_stones.stone_id';
}
