<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Rings\RingTypes\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class RingTypeCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
