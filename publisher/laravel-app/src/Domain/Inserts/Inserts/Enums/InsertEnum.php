<?php
declare(strict_types=1);

namespace Domain\Inserts\Inserts\Enums;

enum InsertEnum: string
{
    case TYPE_RESOURCE = 'inserts';
    case TABLE_NAME    = 'jw_inserts.inserts';
    case PRIMARY_KEY   = 'id';
    case FK_STONE_EXTERIOR = 'stone_exterior_id';
    case FK_JEWELLERY = 'jewellery_id';
//    case FK_INSERT_OPTION_INFO = InsertEnum::PRIMARY_KEY->value;
}
