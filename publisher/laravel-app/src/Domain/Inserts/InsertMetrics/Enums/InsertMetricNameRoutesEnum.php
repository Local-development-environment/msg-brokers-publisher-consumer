<?php
declare(strict_types=1);

namespace Domain\Inserts\InsertMetrics\Enums;

enum InsertMetricNameRoutesEnum: string
{
    case CRUD_INDEX              = 'insert-metrics.index';
    case CRUD_SHOW               = 'insert-metrics.show';
    case CRUD_POST               = 'insert-metrics.post';
    case CRUD_PATCH              = 'insert-metrics.patch';
    case CRUD_DELETE             = 'insert-metrics.delete';
    case RELATIONSHIP_TO_INSERT  = 'insert-metric.relationships.insert';
    case RELATED_TO_INSERT       = 'insert-metric.insert';
}
