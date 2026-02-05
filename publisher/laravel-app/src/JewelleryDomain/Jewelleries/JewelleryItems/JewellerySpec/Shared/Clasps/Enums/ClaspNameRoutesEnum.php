<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Enums;

enum ClaspNameRoutesEnum: string
{
    case CRUD_INDEX                = 'clasps.index';
    case CRUD_SHOW                 = 'clasps.show';
    case CRUD_POST                 = 'clasps.post';
    case CRUD_PATCH                = 'clasps.patch';
    case CRUD_DELETE               = 'clasps.delete';
    case RELATED_TO_BEADS          = 'clasp.beads';
    case RELATIONSHIP_TO_BEADS     = 'clasp.relationships.beads';
    case RELATED_TO_BRACELETS      = 'clasp.bracelets';
    case RELATIONSHIP_TO_BRACELETS = 'clasp.relationships.bracelets';
    case RELATED_TO_CHAINS         = 'clasp.chains';
    case RELATIONSHIP_TO_CHAINS    = 'clasp.relationships.chains';
}
