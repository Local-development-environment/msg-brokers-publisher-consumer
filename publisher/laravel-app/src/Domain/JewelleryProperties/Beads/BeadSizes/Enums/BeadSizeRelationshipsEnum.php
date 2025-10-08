<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadSizes\Enums;

enum BeadSizeRelationshipsEnum: string
{
    case BEADS = 'beads';
    case BEAD_METRICS = 'beadMetrics';
    case LENGTH_NAME = 'lengthName';
}
