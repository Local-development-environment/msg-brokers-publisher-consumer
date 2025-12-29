<?php

namespace App\Http\Admin\Insert\TypeOrigins\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class TypeOriginCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
