<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Facets\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class StoneFacetCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
