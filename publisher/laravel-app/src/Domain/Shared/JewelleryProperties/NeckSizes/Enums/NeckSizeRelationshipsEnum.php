<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\NeckSizes\Enums;

enum NeckSizeRelationshipsEnum: string
{
    case BEADS = 'beads';
    case CHAINS = 'chains';
    case NECKLACES = 'necklaces';
    case LENGTH_NAME      = 'lengthName';
    case BEAD_METRICS     = 'beadMetrics';
    case CHAIN_METRICS    = 'chainMetrics';
    case NECKLACE_METRICS = 'necklaceMetrics';
}
