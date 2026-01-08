<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\TypeOrigins\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class TypeOriginCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
