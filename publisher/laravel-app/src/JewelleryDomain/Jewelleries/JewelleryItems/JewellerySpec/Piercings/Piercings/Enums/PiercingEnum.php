<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\Piercings\Enums;

enum PiercingEnum: string
{
    case TYPE_RESOURCE = 'piercings';
    case TABLE_NAME    = 'jw_properties.piercings';
    case PRIMARY_KEY   = 'id';
}
