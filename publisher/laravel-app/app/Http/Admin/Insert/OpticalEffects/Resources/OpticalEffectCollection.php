<?php

namespace App\Http\Admin\Insert\OpticalEffects\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OpticalEffectCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
