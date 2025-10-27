<?php

namespace Domain\Inserts\Facets\Enums;

enum FacetNameRoutesEnum: string
{
    case CRUD_INDEX              = 'facets.index';
    case CRUD_SHOW               = 'facets.show';
    case CRUD_POST               = 'facets.post';
    case CRUD_PATCH              = 'facets.patch';
    case CRUD_DELETE             = 'facets.delete';
    case RELATIONSHIP_TO_INSERT_EXTERIORS = 'facet.relationships.insert-exteriors';
    case RELATED_TO_INSERT_EXTERIORS      = 'facet.insert-exteriors';
}
