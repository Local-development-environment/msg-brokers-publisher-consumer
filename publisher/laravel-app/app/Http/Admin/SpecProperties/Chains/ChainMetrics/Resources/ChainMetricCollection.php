<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Chains\ChainMetrics\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class ChainMetricCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
