<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Enums;

enum BeadEnum: string
{
    case TYPE_RESOURCE = 'beads';
    case TABLE_NAME    = 'jw_properties.beads';
    case PRIMARY_KEY   = 'id';
    case FK_BEAD_BASE  = 'bead_base_id';
    case FK_CLASP      = 'clasp_id';
}
