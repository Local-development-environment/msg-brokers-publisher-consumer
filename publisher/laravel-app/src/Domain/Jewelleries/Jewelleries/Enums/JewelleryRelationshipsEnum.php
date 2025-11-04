<?php

declare(strict_types=1);

namespace Domain\Jewelleries\Jewelleries\Enums;

enum JewelleryRelationshipsEnum: string
{
    /****** CATEGORY PROPERTIES ******/
    case BEAD = 'bead';
    case BRACELET = 'bracelet';
    case BROOCH = 'brooch';
    case PIERCING = 'piercing';
    case RING = 'ring';
    case TIE_CLIP = 'tieClip';
    case CUFF_LINK = 'cuffLink';
    case CHAIN = 'chain';
    case PENDANT = 'pendant';
    case CHARM_PENDANT = 'charmPendant';
    case NECKLACE = 'necklace';
    case EARRING = 'earring';

    /****** PROPERTIES ******/
    case INSERTS = 'inserts';
    case PICTURES = 'pictures';
    case VIDEOS = 'videos';
    case METALS = 'metals';
    case COVERAGES = 'coverages';
    case PROMOTIONS = 'promotions';
}
