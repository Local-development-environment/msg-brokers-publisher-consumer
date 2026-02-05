<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\BaseWeavings\Enums;

enum BaseWeavingNameRoutesEnum: string
{
    case CRUD_INDEX              = 'base-weavings.index';
    case CRUD_SHOW               = 'base-weavings.show';
    case CRUD_POST               = 'base-weavings.post';
    case CRUD_PATCH              = 'base-weavings.patch';
    case CRUD_DELETE             = 'base-weavings.delete';
    case RELATED_TO_WEAVINGS        = 'base-weaving.weavings';
    case RELATIONSHIP_TO_WEAVINGS   = 'base-weaving.relationships.weavings';
}
