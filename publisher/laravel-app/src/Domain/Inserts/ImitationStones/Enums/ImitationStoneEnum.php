<?php

namespace Domain\Inserts\ImitationStones\Enums;

enum ImitationStoneEnum: string
{
    case RESOURCE     = 'imitationStones';
    case TABLE        = 'jw_inserts.imitation_stones';
    case PRIMARY_KEY  = 'id';
    case FK_STONES    = 'stone_id';
}
