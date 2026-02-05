<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Enums;

enum ChainRelationshipsEnum: string
{
    case NECK_SIZES     = 'neckSizes';
    case CHAIN_METRICS  = 'chainMetrics';
    case CHAIN_WEAVINGS = 'chainWeavings';
    case WEAVINGS       = 'weavings';
    case JEWELLERY      = 'jewellery';
    case CLASP          = 'clasp';
}
