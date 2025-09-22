<?php

namespace App\Http\Admin\Users\Customers\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VCustomerCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
