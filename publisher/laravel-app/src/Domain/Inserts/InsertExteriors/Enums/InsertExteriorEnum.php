<?php
declare(strict_types=1);

namespace Domain\Inserts\InsertExteriors\Enums;

enum InsertExteriorEnum: string
{
    case TYPE_RESOURCE   = 'insertExteriors';
    case TABLE_NAME      = 'jw_inserts.insert_exteriors';
    case PRIMARY_KEY     = 'id';
    case FK_COLOUR       = 'colour_id';
    case FK_FACET        = 'facet_id';
    case FK_STONE        = 'stone_id';
}
