<?php

namespace App\Http\Admin\BeadProperty\Beads\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BeadCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
