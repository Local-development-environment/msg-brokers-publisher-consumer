<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Chains\ChainWeaving\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class ChainWeavingCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
