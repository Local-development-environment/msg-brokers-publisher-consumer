<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\Beads\Enums;

enum BeadRelationshipsEnum: string
{
    case BEAD_SIZES = 'beadSizes';
    case BEAD_METRICS = 'beadMetrics';
    case JEWELLERY = 'jewellery';
    case CLASP = 'clasp';
    case BEAD_BASE = 'beadBase';
}
