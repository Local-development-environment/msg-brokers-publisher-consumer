<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Weavings\Enums;

enum WeavingRelationshipsEnum: string
{
    case BASE_WEAVING      = 'baseWeaving';
    case CHAIN_WEAVINGS    = 'chainWeavings';
    case BRACELET_WEAVINGS = 'braceletWeavings';
    case BRACELETS         = 'bracelets';
    case CHAINS            = 'chains';
}
