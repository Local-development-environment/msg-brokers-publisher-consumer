<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\PiercingSuitable\Enums;

enum PiercingSuitableEnum: string
{
    case TYPE_RESOURCE = 'piercingSuitable';
    case TABLE_NAME    = 'jw_properties.piercing_suitable';
    case PRIMARY_KEY   = 'id';
}
