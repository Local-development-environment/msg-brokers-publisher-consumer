<?php
declare(strict_types=1);

namespace Domain\Inserts\Inserts\Enums;

enum InsertRelationshipsEnum: string
{
    case INSERT_STONE         = 'insertStone';
    case INSERT_OPTIONAL_INFO = 'insertOptionalInfo';
    case METRIC               = 'stoneMetric';
    case JEWELLERY            = 'jewellery';
}
