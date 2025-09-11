<?php

namespace App\Http\Admin\Insert\OptionalInfos\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OptionalInfoCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
