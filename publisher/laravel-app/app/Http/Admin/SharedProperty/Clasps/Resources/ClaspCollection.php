<?php

namespace App\Http\Admin\SharedProperty\Clasps\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ClaspCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
