<?php

namespace Domain\Inserts\NaturalStones\Enums;

enum NaturalStoneEnum: string
{
    case RESOURCE = 'naturalStones';
    case TABLE = 'jw_inserts.natural_stones';
    case PRIMARY_KEY   = 'jw_inserts.natural_stones.id';
    case FK_STONES     = 'jw_inserts.natural_stones.stone_id';
}
