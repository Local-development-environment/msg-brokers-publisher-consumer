<?php

namespace App\Http\Admin\Insert\InsertStones\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InsertStoneCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
