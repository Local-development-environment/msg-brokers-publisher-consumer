<?php

namespace App\Http\Admin\Insert\StoneFamilies\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StoneFamilyCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
