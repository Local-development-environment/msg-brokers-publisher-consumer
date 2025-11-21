<?php
declare(strict_types=1);

namespace Domain\Inserts\Inserts\Enums;

enum InsertRelationshipsEnum: string
{
    case STONE_EXTERIOR         = 'stoneExterior';
    case INSERT_OPTIONAL_INFO = 'insertOptionalInfo';
    case JEWELLERY            = 'jewellery';
}
