<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Enums;

enum BeadMetricNameRoutesEnum: string
{
    case CRUD_INDEX              = 'bead-metrics.index';
    case CRUD_SHOW               = 'bead-metrics.show';
    case CRUD_POST               = 'bead-metrics.post';
    case CRUD_PATCH              = 'bead-metrics.patch';
    case CRUD_DELETE             = 'bead-metrics.delete';
    case RELATED_TO_BEAD        = 'bead-metrics.bead';
    case RELATIONSHIP_TO_BEAD   = 'bead-metrics.relationships.bead';
    case RELATED_TO_NECK_SIZE        = 'bead-metrics.neck-size';
    case RELATIONSHIP_TO_NECK_SIZE   = 'bead-metrics.relationships.neck-size';
}
