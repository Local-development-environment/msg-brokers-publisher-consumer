<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Enums;

enum ClaspEnum: string
{
    case TYPE_RESOURCE = 'clasps';
    case TABLE_NAME = 'jw_properties.clasps';
    case PRIMARY_KEY   = 'id';
}
