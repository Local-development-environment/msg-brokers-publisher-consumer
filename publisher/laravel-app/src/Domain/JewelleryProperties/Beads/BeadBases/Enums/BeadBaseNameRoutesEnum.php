<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadBases\Enums;

enum BeadBaseNameRoutesEnum: string
{
    case CRUD_INDEX              = 'bead-bases.index';
    case CRUD_SHOW               = 'bead-bases.show';
    case CRUD_POST               = 'bead-bases.post';
    case CRUD_PATCH              = 'bead-bases.patch';
    case CRUD_DELETE             = 'bead-bases.delete';
    case RELATED_TO_BEADS        = 'bead-base.beads';
    case RELATIONSHIP_TO_BEADS   = 'bead-base.relationships.beads';
    case RELATED_TO_CLASPS        = 'bead-bases.clasps';
    case RELATIONSHIP_TO_CLASPS   = 'bead-bases.relationships.clasps';
}
