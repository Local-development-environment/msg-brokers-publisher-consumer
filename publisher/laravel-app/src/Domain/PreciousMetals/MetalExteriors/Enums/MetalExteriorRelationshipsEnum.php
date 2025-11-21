<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\MetalExteriors\Enums;

enum MetalExteriorRelationshipsEnum: string
{
    case METAL_HALLMARK = 'hallmark';
    case METAL_COLOUR   = 'metalType';
    case JEWELLERY      = 'jewellery';
}
