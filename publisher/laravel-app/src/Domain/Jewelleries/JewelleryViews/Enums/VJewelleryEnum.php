<?php

namespace Domain\Jewelleries\JewelleryViews\Enums;

enum VJewelleryEnum: string
{
    case TYPE_TYPE_RESOURCE = 'vJewelleries';
    case TABLE_NAME    = 'jw_views.v_jewelleries';
    case FK_CATEGORY   = 'jw_views.v_jewelleries.category_id';
    case FK_STONE_COLOUR   = 'jw_views.v_jewelleries.stone_max_colour_id';
}
