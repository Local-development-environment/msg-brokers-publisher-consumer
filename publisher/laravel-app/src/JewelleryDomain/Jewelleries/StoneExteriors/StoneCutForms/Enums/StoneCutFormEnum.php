<?php

namespace JewelleryDomain\Jewelleries\StoneExteriors\StoneCutForms\Enums;

enum StoneCutFormEnum: string
{
    case TYPE_RESOURCE = 'stoneCutForms';
    case TABLE_NAME    = 'jw_stone_exteriors.stone_cut_forms';
    case PRIMARY_KEY   = 'id';
}
