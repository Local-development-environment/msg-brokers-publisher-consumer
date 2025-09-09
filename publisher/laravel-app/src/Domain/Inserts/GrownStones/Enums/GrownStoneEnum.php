<?php

namespace Domain\Inserts\GrownStones\Enums;

enum GrownStoneEnum: string
{
    case RESOURCE = 'grownStones';
    case TABLE = 'jw_inserts.grown_stones';
    case PRIMARY_KEY   = 'id';
    case FK_STONES     = 'stone_id';
}
