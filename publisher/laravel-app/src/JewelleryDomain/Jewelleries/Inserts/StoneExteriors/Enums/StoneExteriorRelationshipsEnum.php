<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Enums;

enum StoneExteriorRelationshipsEnum: string
{
    case STONE   = 'stone';
    case INSERTS = 'inserts';
    case FACET        = 'facet';
    case STONE_COLOUR = 'stoneColour';
}
