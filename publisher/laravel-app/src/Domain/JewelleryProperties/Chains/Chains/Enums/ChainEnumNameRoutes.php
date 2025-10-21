<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\Chains\Enums;

enum ChainEnumNameRoutes: string
{
    case CRUD_INDEX              = 'chains.index';
    case CRUD_SHOW               = 'chains.show';
    case CRUD_POST               = 'chains.post';
    case CRUD_PATCH              = 'chains.patch';
    case CRUD_DELETE             = 'chains.delete';
    case RELATED_TO_CHAIN_METRICS      = 'chain.chain-metrics';
    case RELATIONSHIP_TO_CHAIN_METRICS = 'chain.relationships.chain-metrics';
    case RELATED_TO_CHAIN_WEAVING      = 'chain.chain-weaving';
    case RELATIONSHIP_TO_CHAIN_WEAVING = 'chain.relationships.chain-weaving';
    case RELATED_TO_NECK_SIZES         = 'chains.neck-sizes';
    case RELATIONSHIP_TO_NECK_SIZES    = 'chains.relationships.neck-sizes';
    case RELATED_TO_JEWELLERY          = 'chain.jewellery';
    case RELATIONSHIP_TO_JEWELLERY     = 'chain.relationships.jewellery';
    case RELATED_TO_CLASP              = 'chains.clasp';
    case RELATIONSHIP_TO_CLASP         = 'chains.relationships.clasp';
}
