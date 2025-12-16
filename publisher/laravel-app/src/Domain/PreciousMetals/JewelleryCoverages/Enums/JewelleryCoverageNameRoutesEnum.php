<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\JewelleryCoverages\Enums;

enum JewelleryCoverageNameRoutesEnum: string
{
    case CRUD_INDEX              = 'jewellery-coverages.index';
    case CRUD_SHOW               = 'jewellery-coverages.show';
    case CRUD_POST               = 'jewellery-coverages.post';
    case CRUD_PATCH              = 'jewellery-coverages.patch';
    case CRUD_DELETE             = 'jewellery-coverages.delete';
    case RELATED_TO_COVERAGE        = 'jewellery-coverages.coverage';
    case RELATIONSHIP_TO_COVERAGE   = 'jewellery-coverages.relationships.coverage';
    case RELATED_TO_JEWELLERY       = 'jewellery-coverages.jewellery';
    case RELATIONSHIP_TO_JEWELLERY  = 'jewellery-coverages.relationships.jewellery';
}
