<?php
declare(strict_types=1);

namespace Domain\Inserts\ImitationStones\Enums;

enum ImitationStoneEnum: string
{
    case TYPE_RESOURCE     = 'imitationStones';
    case TABLE_NAME        = 'jw_inserts.imitation_stones';
    case PRIMARY_KEY  = 'id';
    case FK_STONES    = 'stone_id';
}
