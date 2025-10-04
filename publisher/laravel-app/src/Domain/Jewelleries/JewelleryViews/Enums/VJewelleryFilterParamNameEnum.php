<?php

namespace Domain\Jewelleries\JewelleryViews\Enums;

enum VJewelleryFilterParamNameEnum: string
{
    case PK_ITSELF         = 'id';
    case FK_CATEGORY       = 'category_id';
    case JSON_METAL        = 'metal_id';
    case JSON_STONE_FAMILY = 'family_id';
    case JSON_COVERAGE     = 'coverage_id';
    case JSON_STONE        = 'stone_id';
    case PART_NUMBER       = 'part_number';
    case APPROX_WEIGHT     = 'approx_weight';
    case PRICE_RANGE       = 'price_range';
    case JSON_STONE_GROUP  = 'group_id';
    case JSON_METAL_COLOUR  = 'metal_colour_id';
    case JSON_INSERT_COLOUR  = 'stone_max_colour_id';
}
