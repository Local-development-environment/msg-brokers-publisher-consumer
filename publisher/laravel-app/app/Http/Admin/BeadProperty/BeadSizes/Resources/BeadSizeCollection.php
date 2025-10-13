<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\BeadSizes\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class BeadSizeCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
