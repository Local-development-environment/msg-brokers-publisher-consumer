<?php

namespace App\Http\Admin\Insert\GrownStones\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GrownStoneCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
