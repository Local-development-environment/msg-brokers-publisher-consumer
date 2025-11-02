<?php

namespace App\Http\Admin\BroochProperty\Brooches\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BroochCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
