<?php

namespace App\Http\Admin\Insert\InsertMetrics\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InsertMetricCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
