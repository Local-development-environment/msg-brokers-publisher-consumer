<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Rings\RingMetrics\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class RingMetricCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
