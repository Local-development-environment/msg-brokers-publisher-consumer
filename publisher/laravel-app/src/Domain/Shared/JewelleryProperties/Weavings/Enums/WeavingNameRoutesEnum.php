<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Weavings\Enums;

enum WeavingNameRoutesEnum: string
{
    case CRUD_INDEX                        = 'weavings.index';
    case CRUD_SHOW                         = 'weavings.show';
    case CRUD_POST                         = 'weavings.post';
    case CRUD_PATCH                        = 'weavings.patch';
    case CRUD_DELETE                       = 'weavings.delete';
    case RELATIONSHIP_TO_BASE_WEAVING      = 'weavings.relationships.base-weaving';
    case RELATED_TO_BASE_WEAVING           = 'weavings.base-weaving';
    case RELATIONSHIP_TO_BRACELET_WEAVINGS = 'weaving.relationships.bracelet-weavings';
    case RELATED_TO_BRACELET_WEAVINGS      = 'weaving.bracelet-weavings';
    case RELATIONSHIP_TO_BRACELETS         = 'weavings.relationships.bracelets';
    case RELATED_TO_BRACELETS              = 'weavings.bracelets';
    case RELATIONSHIP_TO_CHAINS            = 'weavings.relationships.chains';
    case RELATED_TO_CHAINS                 = 'weavings.chains';
}
