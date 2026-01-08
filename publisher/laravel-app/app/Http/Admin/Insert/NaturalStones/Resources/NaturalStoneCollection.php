<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\NaturalStones\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class NaturalStoneCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
