<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Chains\Chain\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class ChainCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
