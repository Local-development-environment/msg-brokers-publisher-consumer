<?php

namespace JewelleryDomain\Jewellery\BeadItems\BeadTypeCut\Enums;

enum BeadTypeCutEnum: string
{
    case TYPE_RESOURCE = 'beadTypeCuts';
    case TABLE_NAME    = 'jw_beads_items.bead_type_cuts';
    case PRIMARY_KEY   = 'id';
}
