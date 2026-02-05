<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\ChainWeavings\Enums;

enum ChainWeavingNameRoutesEnum: string
{
    case CRUD_INDEX                = 'chain-weavings.index';
    case CRUD_SHOW                 = 'chain-weavings.show';
    case CRUD_POST                 = 'chain-weavings.post';
    case CRUD_PATCH                = 'chain-weavings.patch';
    case CRUD_DELETE               = 'chain-weavings.delete';
    case RELATED_TO_CHAIN          = 'chain-weavings.chain';
    case RELATIONSHIP_TO_CHAIN     = 'chain-weavings.relationships.chain';
    case RELATED_TO_WEAVING      = 'chain-weavings.weaving';
    case RELATIONSHIP_TO_WEAVING = 'chain-weavings.relationships.weaving';
}
