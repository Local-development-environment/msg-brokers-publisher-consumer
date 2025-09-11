<?php

namespace App\Http\Admin\Insert\StoneFacets\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StoneFacetCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
