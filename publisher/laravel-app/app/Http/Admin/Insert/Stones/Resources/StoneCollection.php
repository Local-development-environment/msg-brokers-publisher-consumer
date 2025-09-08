<?php

namespace App\Http\Admin\Insert\Stones\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StoneCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
