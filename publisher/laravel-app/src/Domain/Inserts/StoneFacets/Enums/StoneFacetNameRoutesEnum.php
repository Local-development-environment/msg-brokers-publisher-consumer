<?php

namespace Domain\Inserts\StoneFacets\Enums;

enum StoneFacetNameRoutesEnum: string
{
    case CRUD_INDEX              = 'stone-facets.index';
    case CRUD_SHOW               = 'stone-facets.show';
    case CRUD_POST               = 'stone-facets.post';
    case CRUD_PATCH              = 'stone-facets.patch';
    case CRUD_DELETE             = 'stone-facets.delete';
    case RELATIONSHIP_TO_INSERT_STONES   = 'stone-facet.relationships.insert-stones';
    case RELATED_TO_INSERT_STONES   = 'stone-facet.insert-stones';
}
