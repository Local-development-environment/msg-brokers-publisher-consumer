<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Enums;

enum BeadMetricEnum: string
{
    case TYPE_RESOURCE = 'beadMetrics';
    case TABLE_NAME = 'jw_properties.bead_metrics';
    case PRIMARY_KEY   = 'id';
    case FK_NECK_SIZE     = 'neck_size_id';
    case FK_BEAD     = 'bead_id';
}
