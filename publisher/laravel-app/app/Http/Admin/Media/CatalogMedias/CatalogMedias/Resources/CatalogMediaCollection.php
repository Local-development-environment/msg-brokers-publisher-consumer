<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\CatalogMedias\CatalogMedias\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class CatalogMediaCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
