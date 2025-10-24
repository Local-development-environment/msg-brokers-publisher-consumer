<?php

namespace Domain\Inserts\StoneMetrics\Enums;

enum StoneMetricEnum: string
{
    case TYPE_RESOURCE = 'stoneMetrics';
    case TABLE_NAME    = 'jw_inserts.metrics';
    case PRIMARY_KEY   = 'id';
}
