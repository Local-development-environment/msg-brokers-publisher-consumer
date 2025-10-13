<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadSizes\Enums;

enum BeadSizeEnum: string
{
    case TYPE_RESOURCE = 'beadSizes';
    case TABLE_NAME    = 'jw_properties.bead_sizes';
    case PRIMARY_KEY   = 'id';
    case FK_LENGTH_NAME     = 'length_name_id';
}
