<?php

namespace Domain\Inserts\Facets\Enums;

enum FacetNameRoutesEnum: string
{
    case CRUD_INDEX                      = 'facets.index';
    case CRUD_SHOW                       = 'facets.show';
    case CRUD_POST                       = 'facets.post';
    case CRUD_PATCH                      = 'facets.patch';
    case CRUD_DELETE                     = 'facets.delete';
    case RELATIONSHIP_TO_STONE_EXTERIORS = 'facet.relationships.stone-exteriors';
    case RELATED_TO_STONE_EXTERIORS      = 'facet.stone-exteriors';
}
