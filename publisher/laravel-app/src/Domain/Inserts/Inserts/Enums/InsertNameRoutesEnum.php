<?php
declare(strict_types=1);

namespace Domain\Inserts\Inserts\Enums;

enum InsertNameRoutesEnum: string
{
    case CRUD_INDEX              = 'inserts.index';
    case CRUD_SHOW               = 'inserts.show';
    case CRUD_POST               = 'inserts.post';
    case CRUD_PATCH              = 'inserts.patch';
    case CRUD_DELETE             = 'inserts.delete';
    case RELATED_TO_JEWELLERY                 = 'inserts.jewellery';
    case RELATIONSHIP_TO_JEWELLERY            = 'inserts.relationships.jewellery';
    case RELATED_TO_INSERT_OPTIONAL_INFO      = 'insert.insert-optional-info';
    case RELATIONSHIP_TO_INSERT_OPTIONAL_INFO = 'insert.relationships.insert-optional-info';
    case RELATED_TO_METRIC                    = 'insert.metric';
    case RELATIONSHIP_TO_METRIC               = 'insert.relationships.metric';
    case RELATED_TO_INSERT_STONE              = 'inserts.insert-stone';
    case RELATIONSHIP_TO_INSERT_STONE         = 'inserts.relationships.insert-stone';

}
