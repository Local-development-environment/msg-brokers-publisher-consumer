<?php

namespace Domain\Inserts\StoneFacets\Enums;

enum StoneFacetEnum: string
{
    case TYPE_RESOURCE = 'stoneFacets';
    case TABLE_NAME    = 'jw_inserts.facets';
    case PRIMARY_KEY   = 'id';
}
