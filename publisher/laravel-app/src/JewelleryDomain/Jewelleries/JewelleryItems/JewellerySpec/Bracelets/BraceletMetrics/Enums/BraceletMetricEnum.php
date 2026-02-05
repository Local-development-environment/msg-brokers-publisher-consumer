<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletMetrics\Enums;

enum BraceletMetricEnum: string
{
    case TYPE_RESOURCE = 'braceletMetrics';
    case TABLE_NAME = 'jw_properties.bracelet_metrics';
    case PRIMARY_KEY   = 'id';
    case FK_BRACELET_SIZE  = 'bracelet_size_id';
    case FK_BRACELET  = 'bracelet_id';
}
