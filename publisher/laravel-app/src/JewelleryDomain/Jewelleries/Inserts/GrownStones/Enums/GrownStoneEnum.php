<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\GrownStones\Enums;

enum GrownStoneEnum: string
{
    case TYPE_RESOURCE = 'grownStones';
    case TABLE_NAME    = 'jw_inserts.grown_stones';
    case PRIMARY_KEY   = 'id';
    case FK_STONES     = 'stone_family_id';
}
