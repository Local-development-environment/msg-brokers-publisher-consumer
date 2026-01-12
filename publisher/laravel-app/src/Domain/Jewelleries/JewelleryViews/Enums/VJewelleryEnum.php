<?php
declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\Enums;

enum VJewelleryEnum: string
{
    case TYPE_RESOURCE = 'vJewelleries';
    case TABLE_NAME            = 'jw_views.v_jewelleries';
    case FK_JEWELLERY_CATEGORY = 'jewellery_category_id';
    case PRIMARY_KEY           = 'id';
}
