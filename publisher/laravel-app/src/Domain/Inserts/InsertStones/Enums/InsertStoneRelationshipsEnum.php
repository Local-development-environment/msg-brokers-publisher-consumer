<?php
declare(strict_types=1);

namespace Domain\Inserts\InsertStones\Enums;

enum InsertStoneRelationshipsEnum: string
{
    case STONE = 'stone';
    case INSERTS = 'inserts';
    case STONE_FACET = 'stoneFacet';
    case STONE_COLOUR = 'stoneColour';
}
