<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\ChainMetrics\Enums;

enum ChainMetricEnum: string
{
    case TYPE_RESOURCE = 'chainMetrics';
    case TABLE_NAME = 'jw_properties.chain_metrics';
    case PRIMARY_KEY   = 'id';
    case FK_NECK_SIZE     = 'neck_size_id';
    case FK_CHAIN     = 'chain_id';
}
