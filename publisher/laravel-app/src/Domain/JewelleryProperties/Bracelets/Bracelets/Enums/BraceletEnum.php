<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\Bracelets\Enums;

enum BraceletEnum: string
{
    case TYPE_RESOURCE = 'bracelets';
    case TABLE_NAME = 'jw_properties.bracelets';
    case PRIMARY_KEY   = 'id';
    case FK_JEWELLERY  = 'jewellery_id';
    case FK_CLASP  = 'clasp_id';
    case FK_BODY_PART  = 'body_part_id';
    case FK_BRACELET_BASE  = 'bracelet_base_id';
}
