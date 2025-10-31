<?php

namespace Domain\Jewelleries\JewelleryViews\Enums;

enum VJewelleryFilterParamNameEnum: string
{
    case OWN_ID             = 'id';
    case CATEGORY_ID        = 'category_id';
    case METAL_ID           = 'metal_id';
    case STONE_FAMILY_ID    = 'family_id';
    case COVERAGE_ID        = 'coverage_id';
    case STONE_ID           = 'stone_id';
    case PART_NUMBER        = 'part_number';
    case APPROX_WEIGHT      = 'approx_weight';
    case PRICE_RANGE        = 'price_range';
    case STONE_GROUP_ID     = 'group_id';
    case METAL_COLOUR_ID    = 'metal_colour_id';
    case DOMINANT_COLOUR_ID = 'dominant_colour_id';
    case IS_INSERTS         = 'is_inserts';
}
