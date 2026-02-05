<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\PreciousMetals\Coverages\Enums;

enum CoverageNameRoutesEnum: string
{
    case CRUD_INDEX  = 'coverages.index';
    case CRUD_SHOW   = 'coverages.show';
    case CRUD_POST   = 'coverages.post';
    case CRUD_PATCH  = 'coverages.patch';
    case CRUD_DELETE = 'coverages.delete';
    case RELATED_TO_METAL_EXTERIORS      = 'coverages.metal-exteriors';
    case RELATIONSHIP_TO_METAL_EXTERIORS = 'coverages.relationships.metal-exteriors';
}
