<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\BeadBase\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class BeadBaseCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
