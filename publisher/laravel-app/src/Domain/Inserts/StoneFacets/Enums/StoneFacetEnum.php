<?php

namespace Domain\Inserts\StoneFacets\Enums;

enum StoneFacetEnum: string
{
    case RESOURCE     = 'stoneFacets';
    case TABLE        = 'jw_inserts.facets';
    case PRIMARY_KEY  = 'id';
}
