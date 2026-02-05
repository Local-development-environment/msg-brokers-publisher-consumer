<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Stones\Enums;

enum StoneRelationshipsEnum: string
{
    case TYPE_ORIGIN          = 'typeOrigin';
    case IMITATION_STONE      = 'imitationStone';
    case GROWN_STONE          = 'grownStone';
    case NATURAL_STONE        = 'naturalStone';
    case FACETS               = 'facets';
    case STONE_COLOURS        = 'stoneColours';
    case STONE_EXTERIORS      = 'stoneExteriors';
    case STONE_OPTICAL_EFFECT = 'stoneOpticalEffect';
}
