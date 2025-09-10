<?php

namespace Domain\Inserts\StoneMetrics\Enums;

enum StoneMetricEnum: string
{
    case RESOURCE     = 'stoneMetrics';
    case TABLE        = 'jw_inserts.metrics';
    case PRIMARY_KEY  = 'id';
}
