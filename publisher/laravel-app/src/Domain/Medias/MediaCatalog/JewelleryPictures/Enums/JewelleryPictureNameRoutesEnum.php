<?php

declare(strict_types=1);

namespace Domain\Medias\MediaCatalog\JewelleryPictures\Enums;

enum JewelleryPictureNameRoutesEnum: string
{
    case CRUD_INDEX              = 'jewellery-pictures.index';
    case CRUD_SHOW               = 'jewellery-pictures.show';
    case CRUD_POST               = 'jewellery-pictures.post';
    case CRUD_PATCH              = 'jewellery-pictures.patch';
    case CRUD_DELETE             = 'jewellery-pictures.delete';

    case RELATED_TO_MEDIA_CATALOG      = 'jewellery-picture.media-catalog';
    case RELATIONSHIP_TO_MEDIA_CATALOG = 'jewellery-picture.relationships.media-catalog';
}
