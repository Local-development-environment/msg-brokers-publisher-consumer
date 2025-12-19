<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\PreciousMetals\Enums;

enum PreciousMetalRelationshipsEnum: string
{
    case JEWELLERIES = 'jewelleries';
    case HALLMARKS   = 'hallmarks';
    case JEWELLERY_METALS   = 'jewellery_metals';
}
