<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingMetrics\Enums;

enum RingMetricNameRoutesEnum: string
{
    case CRUD_INDEX                = 'ring-metrics.index';
    case CRUD_SHOW                 = 'ring-metrics.show';
    case CRUD_POST                 = 'ring-metrics.post';
    case CRUD_PATCH                = 'ring-metrics.patch';
    case CRUD_DELETE               = 'ring-metrics.delete';
    case RELATED_TO_RING_SIZE      = 'ring-metrics.ring-size';
    case RELATIONSHIP_TO_RING_SIZE = 'ring-metrics.relationships.ring-size';
    case RELATED_TO_RING          = 'ring-metrics.ring';
    case RELATIONSHIP_TO_RING     = 'ring-metrics.relationships.ring';
}
