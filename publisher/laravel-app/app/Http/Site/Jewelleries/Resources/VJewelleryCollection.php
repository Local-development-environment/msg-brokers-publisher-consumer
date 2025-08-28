<?php

namespace App\Http\Site\Jewelleries\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VJewelleryCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
