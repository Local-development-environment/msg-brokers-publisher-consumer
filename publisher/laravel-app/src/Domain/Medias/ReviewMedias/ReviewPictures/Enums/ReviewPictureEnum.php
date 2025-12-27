<?php

declare(strict_types=1);

namespace Domain\Medias\ReviewMedias\ReviewPictures\Enums;

enum ReviewPictureEnum: string
{
    case TYPE_RESOURCE = 'reviewPictures';
    case TABLE_NAME    = 'jw_medias.review_pictures';
    case PRIMARY_KEY   = 'id';
}
