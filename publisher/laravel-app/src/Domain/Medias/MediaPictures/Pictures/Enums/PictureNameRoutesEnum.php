<?php

declare(strict_types=1);

namespace Domain\Medias\MediaPictures\Pictures\Enums;

enum PictureNameRoutesEnum: string
{
    case CRUD_INDEX              = 'pictures.index';
    case CRUD_SHOW               = 'pictures.show';
    case CRUD_POST               = 'pictures.post';
    case CRUD_PATCH              = 'pictures.patch';
    case CRUD_DELETE             = 'pictures.delete';

    case RELATED_TO_JEWELLERY      = 'pictures.jewellery';
    case RELATIONSHIP_TO_JEWELLERY = 'pictures.relationships.jewellery';
    case RELATED_TO_PRODUCER       = 'pictures.producer';
    case RELATIONSHIP_TO_PRODUCER  = 'pictures.relationships.producer';
}
