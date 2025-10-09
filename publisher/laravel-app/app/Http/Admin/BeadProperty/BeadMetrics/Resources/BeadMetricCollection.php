<?php

namespace App\Http\Admin\BeadProperty\BeadMetrics\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BeadMetricCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
