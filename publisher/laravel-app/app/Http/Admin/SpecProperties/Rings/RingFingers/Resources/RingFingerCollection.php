<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Rings\RingFingers\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class RingFingerCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
