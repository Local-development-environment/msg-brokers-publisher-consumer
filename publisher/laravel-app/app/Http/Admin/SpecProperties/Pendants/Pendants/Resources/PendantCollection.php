<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Pendants\Pendants\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class PendantCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
