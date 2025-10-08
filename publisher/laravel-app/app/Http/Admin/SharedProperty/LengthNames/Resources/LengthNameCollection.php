<?php

namespace App\Http\Admin\SharedProperty\LengthNames\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LengthNameCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
