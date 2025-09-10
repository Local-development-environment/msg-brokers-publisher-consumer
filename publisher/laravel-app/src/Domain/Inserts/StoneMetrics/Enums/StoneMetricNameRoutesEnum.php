<?php

namespace Domain\Inserts\StoneMetrics\Enums;

enum StoneMetricNameRoutesEnum: string
{
    case CRUD_INDEX              = 'stone-metrics.index';
    case CRUD_SHOW               = 'stone-metrics.show';
    case CRUD_POST               = 'stone-metrics.post';
    case CRUD_PATCH              = 'stone-metrics.patch';
    case CRUD_DELETE             = 'stone-metrics.delete';
    case RELATIONSHIP_TO_INSERT_STONES   = 'stone-metric.relationships.inserts';
    case RELATED_TO_INSERT_STONES   = 'stone-metric.inserts';
}
