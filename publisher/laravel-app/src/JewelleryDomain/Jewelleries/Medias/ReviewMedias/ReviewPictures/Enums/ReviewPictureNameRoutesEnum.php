<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewPictures\Enums;

enum ReviewPictureNameRoutesEnum: string
{
    case CRUD_INDEX              = 'review-pictures.index';
    case CRUD_SHOW               = 'review-pictures.show';
    case CRUD_POST               = 'review-pictures.post';
    case CRUD_PATCH              = 'review-pictures.patch';
    case CRUD_DELETE             = 'review-pictures.delete';

    case RELATED_TO_REVIEW_MEDIA      = 'review-picture.review-media';
    case RELATIONSHIP_TO_REVIEW_MEDIA = 'review-picture.relationships.review-media';
}
