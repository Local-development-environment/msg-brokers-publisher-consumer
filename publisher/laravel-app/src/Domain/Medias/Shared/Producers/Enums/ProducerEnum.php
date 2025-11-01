<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\Producers\Enums;

enum ProducerEnum: string
{
    case TYPE_RESOURCE = 'producers';
    case TABLE_NAME    = 'jw_medias.producers';
    case PRIMARY_KEY   = 'id';
    case FK_PICTURES   = 'picture_id';
    case FK_VIDEOS     = 'video_id';
}
