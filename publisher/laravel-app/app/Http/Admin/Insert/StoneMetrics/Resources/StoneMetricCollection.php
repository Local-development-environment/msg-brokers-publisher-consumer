<?php

namespace App\Http\Admin\Insert\StoneMetrics\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StoneMetricCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
