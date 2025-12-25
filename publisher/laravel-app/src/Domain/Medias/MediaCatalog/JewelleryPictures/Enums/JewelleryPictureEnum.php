<?php

declare(strict_types=1);

namespace Domain\Medias\MediaCatalog\JewelleryPictures\Enums;

enum JewelleryPictureEnum: string
{
    case TYPE_RESOURCE = 'jewelleryPictures';
    case TABLE_NAME    = 'jw_medias.jewellery_pictures';
    case PRIMARY_KEY   = 'id';
}
