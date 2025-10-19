<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Enums;

enum NecklaceMetricNameRoutesEnum: string
{
    case CRUD_INDEX              = 'necklace-metrics.index';
    case CRUD_SHOW               = 'necklace-metrics.show';
    case CRUD_POST               = 'necklace-metrics.post';
    case CRUD_PATCH              = 'necklace-metrics.patch';
    case CRUD_DELETE             = 'necklace-metrics.delete';
    case RELATED_TO_NECKLACE       = 'necklace-metrics.bead';
    case RELATIONSHIP_TO_NECKLACE  = 'necklace-metrics.relationships.bead';
    case RELATED_TO_NECK_SIZE      = 'necklace-metrics.neck-size';
    case RELATIONSHIP_TO_NECK_SIZE = 'necklace-metrics.relationships.neck-size';
}
