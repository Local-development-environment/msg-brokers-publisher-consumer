<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Earrings\EarringClasps\Enums;

enum EarringClaspEnum: string
{
    case TYPE_RESOURCE = 'EarringClasps';
    case TABLE_NAME    = 'jw_properties.earring_clasps';
    case PRIMARY_KEY   = 'id';
}
