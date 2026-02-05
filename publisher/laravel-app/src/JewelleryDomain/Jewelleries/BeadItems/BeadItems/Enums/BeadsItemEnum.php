<?php

namespace JewelleryDomain\Jewelleries\BeadItems\BeadItems\Enums;

enum BeadsItemEnum: string
{
    case TYPE_RESOURCE = 'beadItems';
    case TABLE_NAME    = 'jw_beads_items.bead_items';
    case PRIMARY_KEY   = 'id';
    case FK_STONE      = 'stone_id';
    case FK_STONE_TREATMENT = 'stone_treatment_id';
}
