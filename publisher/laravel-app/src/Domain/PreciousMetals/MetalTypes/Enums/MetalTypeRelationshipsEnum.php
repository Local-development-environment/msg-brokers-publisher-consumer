<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\MetalTypes\Enums;

enum MetalTypeRelationshipsEnum: string
{
    case METAL_HALLMARKS = 'metalHallmarks';
    case HALLMARKS   = 'hallmarks';
}
