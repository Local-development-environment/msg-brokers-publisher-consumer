<?php

namespace App\Http\Admin\Insert\ImitationStones\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ImitationStoneCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
