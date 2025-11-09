<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\Metals\Enums;

enum MetalRelationshipsEnum: string
{
    case METAL_DETAILS = 'metalDetails';
    case COLOURS       = 'colours';
    case HALLMARKS     = 'hallmarks';
}
