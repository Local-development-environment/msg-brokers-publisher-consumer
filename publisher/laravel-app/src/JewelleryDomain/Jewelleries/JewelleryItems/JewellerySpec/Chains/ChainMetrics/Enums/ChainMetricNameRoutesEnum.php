<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\ChainMetrics\Enums;

enum ChainMetricNameRoutesEnum: string
{
    case CRUD_INDEX                = 'chain-metrics.index';
    case CRUD_SHOW                 = 'chain-metrics.show';
    case CRUD_POST                 = 'chain-metrics.post';
    case CRUD_PATCH                = 'chain-metrics.patch';
    case CRUD_DELETE               = 'chain-metrics.delete';
    case RELATED_TO_CHAIN          = 'chain-metrics.chain';
    case RELATIONSHIP_TO_CHAIN     = 'chain-metrics.relationships.chain';
    case RELATED_TO_NECK_SIZE      = 'chain-metrics.neck-size';
    case RELATIONSHIP_TO_NECK_SIZE = 'chain-metrics.relationships.neck-size';
}
