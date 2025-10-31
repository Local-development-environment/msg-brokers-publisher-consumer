<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\InsertExteriors\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class InsertExteriorCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
