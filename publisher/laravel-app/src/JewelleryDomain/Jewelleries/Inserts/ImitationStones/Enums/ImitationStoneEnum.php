<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\ImitationStones\Enums;

enum ImitationStoneEnum: string
{
    case TYPE_RESOURCE = 'imitationStones';
    case TABLE_NAME    = 'jw_inserts.imitation_stones';
    case PRIMARY_KEY   = 'id';
}
