<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\PreciousMetals\PreciousMetals\Enums;

enum PreciousMetalNameRoutesEnum: string
{
    case CRUD_INDEX              = 'precious_metals.index';
    case CRUD_SHOW               = 'precious_metals.show';
    case CRUD_POST               = 'precious_metals.post';
    case CRUD_PATCH              = 'precious_metals.patch';
    case CRUD_DELETE             = 'precious_metals.delete';
    case RELATED_TO_JEWELLERY_METALS      = 'precious_metal.jewellery-metals';
    case RELATIONSHIP_TO_JEWELLERY_METALS = 'precious_metal.relationships.jewellery-metals';
    case RELATED_TO_HALLMARKS             = 'precious_metals.hallmarks';
    case RELATIONSHIP_TO_HALLMARKS        = 'precious_metals.relationships.hallmarks';
    case RELATED_TO_JEWELLERIES           = 'precious_metals.jewelleries';
    case RELATIONSHIP_TO_JEWELLERIES      = 'precious_metals.relationships.jewelleries';
}
