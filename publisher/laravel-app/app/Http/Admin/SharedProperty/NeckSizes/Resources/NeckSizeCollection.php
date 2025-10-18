<?php

namespace App\Http\Admin\SharedProperty\NeckSizes\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NeckSizeCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
