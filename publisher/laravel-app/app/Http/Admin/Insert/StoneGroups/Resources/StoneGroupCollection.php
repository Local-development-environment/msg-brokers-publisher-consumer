<?php

namespace App\Http\Admin\Insert\StoneGroups\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StoneGroupCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
