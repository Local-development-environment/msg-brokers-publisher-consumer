<?php

namespace App\Http\Admin\Insert\NaturalStones\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NaturalStoneCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
