<?php
declare(strict_types=1);

namespace Domain\Inserts\StoneExteriors\Enums;

enum StoneExteriorNameRoutesEnum: string
{
    case CRUD_INDEX                   = 'stone-exteriors.index';
    case CRUD_SHOW                    = 'stone-exteriors.show';
    case CRUD_POST                    = 'stone-exteriors.post';
    case CRUD_PATCH                   = 'stone-exteriors.patch';
    case CRUD_DELETE                  = 'stone-exteriors.delete';
    case RELATED_TO_STONE             = 'stone-exteriors.stone';
    case RELATIONSHIP_TO_STONE        = 'stone-exteriors.relationships.stone';
    case RELATED_TO_STONE_COLOUR      = 'stone-exteriors.colour';
    case RELATIONSHIP_TO_STONE_COLOUR = 'stone-exteriors.relationships.colour';
    case RELATED_TO_STONE_FACET       = 'stone-exteriors.facet';
    case RELATIONSHIP_TO_STONE_FACET  = 'stone-exteriors.relationships.facet';
    case RELATED_TO_INSERTS           = 'stone-exterior.inserts';
    case RELATIONSHIP_TO_INSERTS      = 'stone-exterior.relationships.inserts';
}
