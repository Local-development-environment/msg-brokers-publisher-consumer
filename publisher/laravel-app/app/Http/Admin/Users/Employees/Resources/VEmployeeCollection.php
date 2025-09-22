<?php

namespace App\Http\Admin\Users\Employees\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VEmployeeCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
