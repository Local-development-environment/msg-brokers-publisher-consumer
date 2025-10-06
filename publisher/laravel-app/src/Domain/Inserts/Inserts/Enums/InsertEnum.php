<?php
declare(strict_types=1);

namespace Domain\Inserts\Inserts\Enums;

enum InsertEnum: string
{
    case TYPE_RESOURCE     = 'inserts';
    case TABLE_NAME        = 'jw_inserts.inserts';
    case PRIMARY_KEY  = 'id';
    case FK_INSERT_STONE = 'insert_stone_id';
    case FK_JEWELLERY    = 'jewellery_id';
    case FK_METRIC       = 'metric_id';
}
