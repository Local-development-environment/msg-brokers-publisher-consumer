<?php

namespace JewelleryDomain\Jewelleries\Inserts\Facets\Enums;

enum FacetEnum: string
{
    case TYPE_RESOURCE = 'facets';
    case TABLE_NAME    = 'jw_inserts.facets';
    case PRIMARY_KEY   = 'id';
}
