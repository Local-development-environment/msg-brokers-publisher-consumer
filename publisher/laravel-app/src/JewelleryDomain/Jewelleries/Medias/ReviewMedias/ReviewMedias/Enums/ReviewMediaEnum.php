<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewMedias\Enums;

enum ReviewMediaEnum: string
{
    case TYPE_RESOURCE = 'reviewMedias';
    case TABLE_NAME    = 'jw_medias.review_medias';
    case PRIMARY_KEY   = 'id';
    case FK_JEWELLERY  = 'jewellery_id';
    case FK_MEDIA_TYPE = 'media_type_id';
}
