<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingMetrics\Enums;

enum RingMetricEnum: string
{
    case TYPE_RESOURCE = 'ringMetrics';
    case TABLE_NAME    = 'jw_properties.ring_metrics';
    case PRIMARY_KEY   = 'id';
}
