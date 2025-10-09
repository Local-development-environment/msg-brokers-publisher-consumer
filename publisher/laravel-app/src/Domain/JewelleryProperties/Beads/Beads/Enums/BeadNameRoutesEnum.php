<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\Beads\Enums;

enum BeadNameRoutesEnum: string
{
    case CRUD_INDEX              = 'beads.index';
    case CRUD_SHOW               = 'beads.show';
    case CRUD_POST               = 'beads.post';
    case CRUD_PATCH              = 'beads.patch';
    case CRUD_DELETE             = 'beads.delete';
    case RELATED_TO_BEAD_METRICS        = 'bead.bead-metrics';
    case RELATIONSHIP_TO_BEAD_METRICS   = 'bead.relationships.bead-metrics';
    case RELATED_TO_BEAD_BASE        = 'beads.bead-base';
    case RELATIONSHIP_TO_BEAD_BASE   = 'beads.relationships.bead-base';
    case RELATED_TO_BEAD_SIZES   = 'beads.bead-sizes';
    case RELATIONSHIP_TO_BEAD_SIZES   = 'beads.relationships.bead-sizes';
    case RELATED_TO_JEWELLERY   = 'bead.jewellery';
    case RELATIONSHIP_TO_JEWELLERY   = 'bead.relationships.jewellery';
    case RELATED_TO_CLASP   = 'beads.clasp';
    case RELATIONSHIP_TO_CLASP   = 'beads.relationships.clasp';
}
