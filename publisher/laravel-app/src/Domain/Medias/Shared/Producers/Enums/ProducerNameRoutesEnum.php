<?php

declare(strict_types=1);

namespace Domain\Medias\Shared\Producers\Enums;

enum ProducerNameRoutesEnum: string
{
    case CRUD_INDEX              = 'producers.index';
    case CRUD_SHOW               = 'producers.show';
    case CRUD_POST               = 'producers.post';
    case CRUD_PATCH              = 'producers.patch';
    case CRUD_DELETE             = 'producers.delete';

    case RELATED_TO_VIDEOS         = 'producer.videos';
    case RELATIONSHIP_TO_VIDEOS    = 'producer.relationships.videos';
    case RELATED_TO_PICTURES       = 'producer.pictures';
    case RELATIONSHIP_TO_PICTURES  = 'producer.relationships.pictures';
}
