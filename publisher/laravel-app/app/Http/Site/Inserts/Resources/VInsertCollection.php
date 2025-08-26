<?php

namespace App\Http\Site\Inserts\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VInsertCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
