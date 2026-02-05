<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Enums;

enum ChainNameRoutesEnum: string
{
    case CRUD_INDEX              = 'chains.index';
    case CRUD_SHOW               = 'chains.show';
    case CRUD_POST               = 'chains.post';
    case CRUD_PATCH              = 'chains.patch';
    case CRUD_DELETE             = 'chains.delete';
    case RELATED_TO_CHAIN_METRICS      = 'chain.chain-metrics';
    case RELATIONSHIP_TO_CHAIN_METRICS = 'chain.relationships.chain-metrics';
    case RELATED_TO_CHAIN_WEAVINGS      = 'chain.chain-weavings';
    case RELATIONSHIP_TO_CHAIN_WEAVINGS = 'chain.relationships.chain-weavings';
    case RELATED_TO_NECK_SIZES         = 'chains.neck-sizes';
    case RELATIONSHIP_TO_NECK_SIZES    = 'chains.relationships.neck-sizes';
    case RELATIONSHIP_TO_WEAVINGS    = 'chains.relationships.weavings';
    case RELATED_TO_WEAVINGS         = 'chains.weavings';
    case RELATED_TO_JEWELLERY          = 'chain.jewellery';
    case RELATIONSHIP_TO_JEWELLERY     = 'chain.relationships.jewellery';
    case RELATED_TO_CLASP              = 'chains.clasp';
    case RELATIONSHIP_TO_CLASP         = 'chains.relationships.clasp';
}
