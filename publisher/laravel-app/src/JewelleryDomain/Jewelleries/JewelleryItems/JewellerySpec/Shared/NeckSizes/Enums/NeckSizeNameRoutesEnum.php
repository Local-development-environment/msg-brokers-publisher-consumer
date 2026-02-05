<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Enums;

enum NeckSizeNameRoutesEnum: string
{
    case CRUD_INDEX               = 'neck-sizes.index';
    case CRUD_SHOW                = 'neck-sizes.show';
    case CRUD_POST                = 'neck-sizes.post';
    case CRUD_PATCH               = 'neck-sizes.patch';
    case CRUD_DELETE              = 'neck-sizes.delete';
    case RELATED_TO_LENGTH_NAME          = 'neck-sizes.length-name';
    case RELATIONSHIP_TO_LENGTH_NAME     = 'neck-sizes.relationships.length-name';
    case RELATED_TO_BEAD_METRICS          = 'neck-size.bead-metrics';
    case RELATIONSHIP_TO_BEAD_METRICS     = 'neck-size.relationships.bead-metrics';
    case RELATED_TO_CHAIN_METRICS         = 'neck-size.chain-metrics';
    case RELATIONSHIP_TO_CHAIN_METRICS    = 'neck-size.relationships.chain-metrics';
    case RELATED_TO_NECKLACE_METRICS      = 'neck-size.necklace-metrics';
    case RELATIONSHIP_TO_NECKLACE_METRICS = 'neck-size.relationships.necklace-metrics';
    case RELATED_TO_BEADS                 = 'neck-sizes.beads';
    case RELATIONSHIP_TO_BEADS            = 'neck-sizes.relationships.beads';
    case RELATED_TO_CHAINS                 = 'neck-sizes.chains';
    case RELATIONSHIP_TO_CHAINS            = 'neck-sizes.relationships.chains';
    case RELATED_TO_NECKLACES                 = 'neck-sizes.necklaces';
    case RELATIONSHIP_TO_NECKLACES            = 'neck-sizes.relationships.necklaces';
}
