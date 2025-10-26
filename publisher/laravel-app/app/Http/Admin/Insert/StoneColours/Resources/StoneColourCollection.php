<?php

namespace App\Http\Admin\Insert\StoneColours\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StoneColourCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
