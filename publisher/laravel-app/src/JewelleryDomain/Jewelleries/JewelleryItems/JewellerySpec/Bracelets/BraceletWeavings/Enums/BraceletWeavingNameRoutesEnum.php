<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletWeavings\Enums;

enum BraceletWeavingNameRoutesEnum: string
{
    case CRUD_INDEX               = 'bracelet-weavings.index';
    case CRUD_SHOW                = 'bracelet-weavings.show';
    case CRUD_POST                = 'bracelet-weavings.post';
    case CRUD_PATCH               = 'bracelet-weavings-metrics.patch';
    case CRUD_DELETE              = 'bracelet-weavings.delete';
    case RELATED_TO_WEAVING       = 'bracelet-weavings.weaving';
    case RELATIONSHIP_TO_WEAVING  = 'bracelet-weavings.relationships.weaving';
    case RELATED_TO_BRACELET      = 'bracelet-weavings.bracelet';
    case RELATIONSHIP_TO_BRACELET = 'bracelet-weavings.relationships.bracelet';
}
