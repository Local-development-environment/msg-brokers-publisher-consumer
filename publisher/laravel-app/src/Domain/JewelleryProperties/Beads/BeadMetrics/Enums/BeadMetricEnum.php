<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadMetrics\Enums;

enum BeadMetricEnum: string
{
    case TYPE_RESOURCE = 'beadMetrics';
    case TABLE_NAME = 'jw_properties.bead_metrics';
    case PRIMARY_KEY   = 'id';
    case FK_BEAD_SIZE     = 'bead_size_id';
    case FK_BEAD     = 'bead_id';
}
