<?php

namespace Domain\Jewelleries\JewelleryViews\Enums;

enum VJewelleryFilterEnum: string
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
}
