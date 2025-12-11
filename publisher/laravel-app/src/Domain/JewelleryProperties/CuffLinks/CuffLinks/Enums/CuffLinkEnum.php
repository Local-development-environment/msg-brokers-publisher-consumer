<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\CuffLinks\CuffLinks\Enums;

enum CuffLinkEnum: string
{
    case TYPE_RESOURCE = 'cuffLinks';
    case TABLE_NAME    = 'jw_properties.cuff_links';
    case PRIMARY_KEY   = 'id';
}
