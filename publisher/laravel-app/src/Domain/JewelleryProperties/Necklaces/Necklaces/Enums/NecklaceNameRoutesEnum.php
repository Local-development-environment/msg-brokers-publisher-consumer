<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\Necklaces\Enums;

enum NecklaceNameRoutesEnum: string
{
    case CRUD_INDEX              = 'necklaces.index';
    case CRUD_SHOW               = 'necklaces.show';
    case CRUD_POST               = 'necklaces.post';
    case CRUD_PATCH              = 'necklaces.patch';
    case CRUD_DELETE             = 'necklaces.delete';
    case RELATED_TO_NECKLACE_METRICS      = 'necklace.necklace-metrics';
    case RELATIONSHIP_TO_NECKLACE_METRICS = 'necklace.relationships.necklace-metrics';
    case RELATED_TO_NECK_SIZES        = 'necklaces.neck-sizes';
    case RELATIONSHIP_TO_NECK_SIZES   = 'necklaces.relationships.neck-sizes';
    case RELATED_TO_JEWELLERY         = 'necklace.jewellery';
    case RELATIONSHIP_TO_JEWELLERY    = 'necklace.relationships.jewellery';
    case RELATED_TO_CLASP             = 'necklaces.clasp';
    case RELATIONSHIP_TO_CLASP        = 'necklaces.relationships.clasp';
}
