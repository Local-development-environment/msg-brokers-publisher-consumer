<?php

namespace App\Http\Admin\Jewellery\Jewelleries\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

class JewelleryCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
