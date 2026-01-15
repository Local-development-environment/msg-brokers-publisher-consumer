<?php
declare(strict_types=1);

namespace App\Http\Site\Jewelleries\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class VJewelleryCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
