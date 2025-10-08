<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadSizes\Enums;

enum BeadSizeNameRoutesEnum: string
{
    case CRUD_INDEX              = 'bead-sizes.index';
    case CRUD_SHOW               = 'bead-sizes.show';
    case CRUD_POST               = 'bead-sizes.post';
    case CRUD_PATCH              = 'bead-sizes.patch';
    case CRUD_DELETE             = 'bead-sizes.delete';
    case RELATED_TO_BEADS        = 'bead-sizes.beads';
    case RELATIONSHIP_TO_BEADS   = 'bead-sizes.relationships.beads';
    case RELATED_TO_LENGTH_NAME  = 'bead-sizes.length-name';
    case RELATIONSHIP_TO_LENGTH_NAME   = 'bead-sizes.relationships.length-name';
    case RELATED_TO_BEAD_METRICS   = 'bead-size.bead-metrics';
    case RELATIONSHIP_TO_BEAD_METRICS   = 'bead-size.relationships.bead-metrics';
}
