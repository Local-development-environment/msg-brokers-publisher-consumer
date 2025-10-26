<?php

namespace Domain\Inserts\InsertMetrics\Enums;

enum InsertMetricEnum: string
{
    case TYPE_RESOURCE = 'insertMetrics';
    case TABLE_NAME    = 'jw_inserts.insert_metrics';
    case PRIMARY_KEY   = 'id';
}
