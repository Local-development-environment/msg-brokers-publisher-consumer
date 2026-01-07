<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\BeadMetrics\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class BeadMetricCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
