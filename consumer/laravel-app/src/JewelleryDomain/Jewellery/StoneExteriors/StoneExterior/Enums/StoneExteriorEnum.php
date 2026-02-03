<?php

namespace JewelleryDomain\Jewellery\StoneExteriors\StoneExterior\Enums;

enum StoneExteriorEnum: string
{
    case TYPE_RESOURCE      = 'stoneExteriors';
    case TABLE_NAME         = 'jw_stone_exteriors.stone_exteriors';
    case PRIMARY_KEY        = 'id';
    case FK_STONE           = 'stone_id';
    case FK_STONE_TREATMENT = 'stone_treatment_id';
}
