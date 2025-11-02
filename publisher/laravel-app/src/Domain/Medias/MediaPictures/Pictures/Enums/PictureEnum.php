<?php

declare(strict_types=1);

namespace Domain\Medias\MediaPictures\Pictures\Enums;

enum PictureEnum: string
{
    case TYPE_RESOURCE = 'pictures';
    case TABLE_NAME    = 'jw_medias.pictures';
    case PRIMARY_KEY   = 'id';
    case FK_JEWELLERY  = 'jewellery_id';
    case FK_PRODUCER   = 'producer_id';
}
