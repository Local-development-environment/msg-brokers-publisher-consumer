<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewelleryBase\Enums;

enum JewelleryNameRoutesEnum: string
{
    case CRUD_INDEX  = 'jewelleries.index';
    case CRUD_SHOW   = 'jewelleries.show';
    case CRUD_POST   = 'jewelleries.post';
    case CRUD_PATCH  = 'jewelleries.patch';
    case CRUD_DELETE = 'jewelleries.delete';
    //*********** PROPERTIES BY CATEGORY ****************/
    case RELATED_TO_BEAD               = 'jewellery.bead';
    case RELATIONSHIP_TO_BEAD          = 'jewellery.relationships.bead';
    case RELATED_TO_BRACELET           = 'jewellery.bracelet';
    case RELATIONSHIP_TO_BRACELET      = 'jewellery.relationships.bracelet';
    case RELATED_TO_BROOCH             = 'jewellery.brooch';
    case RELATIONSHIP_TO_BROOCH        = 'jewellery.relationships.brooch';
    case RELATED_TO_PIERCING           = 'jewellery.piercing';
    case RELATIONSHIP_TO_PIERCING      = 'jewellery.relationships.piercing';
    case RELATED_TO_RING               = 'jewellery.ring';
    case RELATIONSHIP_TO_RING          = 'jewellery.relationships.ring';
    case RELATED_TO_TIE_CLIP           = 'jewellery.tie-clip';
    case RELATIONSHIP_TO_TIE_CLIP      = 'jewellery.relationships.tie-clip';
    case RELATED_TO_CUFF_LINK          = 'jewellery.cuff-link';
    case RELATIONSHIP_TO_CUFF_LINK     = 'jewellery.relationships.cuff-link';
    case RELATED_TO_CHAIN              = 'jewellery.chain';
    case RELATIONSHIP_TO_CHAIN         = 'jewellery.relationships.chain';
    case RELATED_TO_PENDANT            = 'jewellery.pendant';
    case RELATIONSHIP_TO_PENDANT       = 'jewellery.relationships.pendant';
    case RELATED_TO_CHARM_PENDANT      = 'jewellery.charm-pendant';
    case RELATIONSHIP_TO_CHARM_PENDANT = 'jewellery.relationships.charm-pendant';
    case RELATED_TO_NECKLACE           = 'jewellery.necklace';
    case RELATIONSHIP_TO_NECKLACE      = 'jewellery.relationships.necklace';
    case RELATED_TO_EARRING            = 'jewellery.earring';
    case RELATIONSHIP_TO_EARRING       = 'jewellery.relationships.earring';

    /****************** PROPERTIES ****************/
    case RELATED_TO_INSERTS                 = 'jewellery.inserts';
    case RELATIONSHIP_TO_INSERTS            = 'jewellery.relationships.inserts';
    case RELATED_TO_PICTURES                = 'jewellery.pictures';
    case RELATIONSHIP_TO_PICTURES           = 'jewellery.relationships.pictures';
    case RELATED_TO_VIDEOS                  = 'jewellery.videos';
    case RELATIONSHIP_TO_VIDEOS             = 'jewellery.relationships.videos';
    case RELATED_TO_METALS                  = 'jewellery.metals';
    case RELATIONSHIP_TO_METALS             = 'jewellery.relationships.metals';
    case RELATED_TO_COVERAGES               = 'jewellery.coverages';
    case RELATIONSHIP_TO_COVERAGES          = 'jewellery.relationships.coverages';
    case RELATED_TO_PROMOTIONS              = 'jewellery.promotions';
    case RELATIONSHIP_TO_PROMOTIONS         = 'jewellery.relationships.promotions';
    case RELATED_TO_JEWELLERY_CATEGORY      = 'jewelleries.jewellery-category';
    case RELATIONSHIP_TO_JEWELLERY_CATEGORY = 'jewelleries.relationships.jewellery-category';
}
