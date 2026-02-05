<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadBases\Enums;

enum BeadBaseEnum: string
{
    case TYPE_RESOURCE = 'beadBases';
    case TABLE_NAME = 'jw_properties.bead_bases';
    case PRIMARY_KEY   = 'id';
}
