<?php
declare(strict_types=1);

namespace App\Http\Admin\NecklaceProperty\Necklaces\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
//use App\Http\Shared\Resources\Traits\ImprovedTraits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class NecklaceCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
