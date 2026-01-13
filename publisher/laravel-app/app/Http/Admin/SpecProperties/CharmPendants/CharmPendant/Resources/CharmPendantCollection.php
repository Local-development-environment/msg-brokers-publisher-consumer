<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\CharmPendants\CharmPendant\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class CharmPendantCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
