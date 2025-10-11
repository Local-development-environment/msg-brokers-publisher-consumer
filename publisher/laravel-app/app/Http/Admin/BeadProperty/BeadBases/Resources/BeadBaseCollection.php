<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\BeadBases\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class BeadBaseCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
