<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Enums;

enum NecklaceMetricEnum: string
{
    case TYPE_RESOURCE = 'necklaceMetrics';
    case TABLE_NAME    = 'jw_properties.necklace_metrics';
    case PRIMARY_KEY   = 'id';
    case FK_NECK_SIZE  = 'neck_size_id';
    case FK_CHAIN      = 'necklace_id';
}
