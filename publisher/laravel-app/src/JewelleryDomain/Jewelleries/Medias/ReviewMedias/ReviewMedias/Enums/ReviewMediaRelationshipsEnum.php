<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewMedias\Enums;

enum ReviewMediaRelationshipsEnum: string
{
    case JEWELLERY = 'jewellery';
    case MEDIA_TYPE = 'mediaType';
    case REVIEW_VIDEO = 'reviewVideo';
    case REVIEW_PICTURE = 'reviewPicture';
}
