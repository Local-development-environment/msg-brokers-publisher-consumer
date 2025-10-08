<?php

namespace App\Http\Admin\BeadProperty\BeadBases\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BeadBaseCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
