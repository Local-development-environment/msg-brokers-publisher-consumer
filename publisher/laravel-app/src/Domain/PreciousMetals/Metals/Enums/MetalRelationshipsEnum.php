<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\Metals\Enums;

enum MetalRelationshipsEnum: string
{
    case METAL_HALLMARK = 'metalHallmark';
    case METAL_COLOUR   = 'metalColour';
    case JEWELLERY      = 'jewellery';
}
