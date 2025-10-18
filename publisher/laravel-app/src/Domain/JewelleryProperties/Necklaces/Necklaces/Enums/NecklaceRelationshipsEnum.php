<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\Necklaces\Enums;

enum NecklaceRelationshipsEnum: string
{
    case NECK_SIZES       = 'neckSizes';
    case NECKLACE_METRICS = 'necklaceMetrics';
    case JEWELLERY        = 'jewellery';
    case CLASP            = 'clasp';
}
