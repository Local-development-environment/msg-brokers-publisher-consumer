<?php

namespace App\Http\Admin\Piercing\Piercings\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PiercingCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
