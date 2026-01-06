<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletMetrics\Enums;

enum BraceletMetricNameRoutesEnum: string
{
    case CRUD_INDEX                    = 'bracelet-metrics.index';
    case CRUD_SHOW                     = 'bracelet-metrics.show';
    case CRUD_POST                     = 'bracelet-metrics.post';
    case CRUD_PATCH                    = 'bracelet-metrics.patch';
    case CRUD_DELETE                   = 'bracelet-metrics.delete';
    case RELATED_TO_BRACELET_SIZE      = 'bracelet-metrics.bracelet-size';
    case RELATIONSHIP_TO_BRACELET_SIZE = 'bracelet-metrics.relationships.bracelet-size';
    case RELATED_TO_BRACELET           = 'bracelet-metrics.bracelet';
    case RELATIONSHIP_TO_BRACELET      = 'bracelet-metrics.relationships.bracelet';
}
