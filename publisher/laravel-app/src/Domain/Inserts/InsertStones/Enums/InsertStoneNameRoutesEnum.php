<?php
declare(strict_types=1);

namespace Domain\Inserts\InsertStones\Enums;

enum InsertStoneNameRoutesEnum: string
{
    case CRUD_INDEX              = 'insert-stones.index';
    case CRUD_SHOW               = 'insert-stones.show';
    case CRUD_POST               = 'insert-stones.post';
    case CRUD_PATCH              = 'insert-stones.patch';
    case CRUD_DELETE             = 'insert-stones.delete';
    case RELATED_TO_STONE        = 'insert-stone.stone';
    case RELATIONSHIP_TO_STONE   = 'insert-stone.relationships.stone';
    case RELATED_TO_STONE_COLOUR      = 'insert-stones.colour';
    case RELATIONSHIP_TO_STONE_COLOUR = 'insert-stones.relationships.colour';
    case RELATED_TO_STONE_FACET      = 'insert-stones.facet';
    case RELATIONSHIP_TO_STONE_FACET = 'insert-stones.relationships.facet';
    case RELATED_TO_INSERTS      = 'insert-stone.inserts';
    case RELATIONSHIP_TO_INSERTS = 'insert-stone.relationships.inserts';
}
