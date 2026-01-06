<?php
declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryCategories\Enums;

enum JewelleryCategoryEnum: string
{
    case TYPE_RESOURCE = 'jewelleryCategories';
    case TABLE_NAME    = 'jewelleries.jewellery_categories';
    case PRIMARY_KEY   = 'id';
}
