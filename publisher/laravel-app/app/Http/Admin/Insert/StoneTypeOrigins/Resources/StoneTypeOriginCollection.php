<?php

namespace App\Http\Admin\Insert\StoneTypeOrigins\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StoneTypeOriginCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
