<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\Chains\Enums;

enum ChainRelationshipsEnum: string
{
    case NECK_SIZES   = 'neckSizes';
    case CHAIN_METRICS = 'chainMetrics';
    case CHAIN_WEAVING = 'chainWeaving';
    case JEWELLERY    = 'jewellery';
    case CLASP        = 'clasp';
}
