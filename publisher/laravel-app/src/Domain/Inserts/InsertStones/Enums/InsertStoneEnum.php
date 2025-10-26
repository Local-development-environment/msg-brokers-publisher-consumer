<?php
declare(strict_types=1);

namespace Domain\Inserts\InsertStones\Enums;

enum InsertStoneEnum: string
{
    case TYPE_RESOURCE     = 'insertStones';
    case TABLE_NAME        = 'jw_inserts.insert_stones';
    case PRIMARY_KEY  = 'id';
    case FK_STONE_COLOUR = 'colour_id';
    case FK_STONE_FACET  = 'facet_id';
    case FK_STONE        = 'stone_id';
}
