<?php
declare(strict_types=1);

namespace Domain\Inserts\Inserts\Enums;

enum InsertRelationshipsEnum: string
{
    case INSERT_STONE  = 'insertStone';
    case OPTIONAL_INFO = 'optionalInfo';
    case METRIC        = 'stoneMetric';
    case JEWELLERY     = 'jewellery';
}
