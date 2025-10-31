<?php
declare(strict_types=1);

namespace App\Http\Site\Inserts\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class VInsertCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
