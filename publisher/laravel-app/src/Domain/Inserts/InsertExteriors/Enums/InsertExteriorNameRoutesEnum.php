<?php
declare(strict_types=1);

namespace Domain\Inserts\InsertExteriors\Enums;

enum InsertExteriorNameRoutesEnum: string
{
    case CRUD_INDEX                   = 'insert-exteriors.index';
    case CRUD_SHOW                    = 'insert-exteriors.show';
    case CRUD_POST                    = 'insert-exteriors.post';
    case CRUD_PATCH                   = 'insert-exteriors.patch';
    case CRUD_DELETE                  = 'insert-exteriors.delete';
    case RELATED_TO_STONE             = 'insert-exteriors.stone';
    case RELATIONSHIP_TO_STONE        = 'insert-exteriors.relationships.stone';
    case RELATED_TO_STONE_COLOUR      = 'insert-exteriors.colour';
    case RELATIONSHIP_TO_STONE_COLOUR = 'insert-exteriors.relationships.colour';
    case RELATED_TO_STONE_FACET       = 'insert-exteriors.facet';
    case RELATIONSHIP_TO_STONE_FACET  = 'insert-exteriors.relationships.facet';
    case RELATED_TO_INSERTS           = 'insert-exterior.inserts';
    case RELATIONSHIP_TO_INSERTS      = 'insert-exterior.relationships.inserts';
}
