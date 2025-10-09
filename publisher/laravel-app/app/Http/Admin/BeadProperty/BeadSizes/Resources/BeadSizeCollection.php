<?php

namespace App\Http\Admin\BeadProperty\BeadSizes\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BeadSizeCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
