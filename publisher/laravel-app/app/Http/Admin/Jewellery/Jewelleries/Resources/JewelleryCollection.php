<?php
declare(strict_types=1);

namespace App\Http\Admin\Jewellery\Jewelleries\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class JewelleryCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
