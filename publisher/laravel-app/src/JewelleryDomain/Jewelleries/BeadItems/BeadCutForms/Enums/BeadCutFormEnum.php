<?php

namespace JewelleryDomain\Jewelleries\BeadItems\BeadCutForms\Enums;

enum BeadCutFormEnum: string
{
    case TYPE_RESOURCE = 'beadCutForms';
    case TABLE_NAME    = 'jw_beads_items.bead_cut_forms';
    case PRIMARY_KEY   = 'id';
}
