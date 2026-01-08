<?php
declare(strict_types=1);

namespace Domain\Inserts\StoneExteriors\Enums;

enum StoneExteriorEnum: string
{
    case TYPE_RESOURCE   = 'stoneExteriors';
    case TABLE_NAME      = 'jw_inserts.stone_exteriors';
    case PRIMARY_KEY     = 'id';
    case FK_COLOUR       = 'stone_colour_id';
    case FK_FACET        = 'facet_id';
    case FK_STONE        = 'stone_id';
}
