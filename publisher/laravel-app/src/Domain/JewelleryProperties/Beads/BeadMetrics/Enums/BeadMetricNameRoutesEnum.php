<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadMetrics\Enums;

enum BeadMetricNameRoutesEnum: string
{
    case CRUD_INDEX              = 'bead-metrics.index';
    case CRUD_SHOW               = 'bead-metrics.show';
    case CRUD_POST               = 'bead-metrics.post';
    case CRUD_PATCH              = 'bead-metrics.patch';
    case CRUD_DELETE             = 'bead-metrics.delete';
    case RELATED_TO_BEAD        = 'bead-metrics.bead';
    case RELATIONSHIP_TO_BEAD   = 'bead-metrics.relationships.bead';
    case RELATED_TO_BEAD_SIZE        = 'bead-metrics.bead-size';
    case RELATIONSHIP_TO_BEAD_SIZE   = 'bead-metrics.relationships.bead-size';
}
