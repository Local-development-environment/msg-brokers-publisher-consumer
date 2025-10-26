<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Inserts\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class InsertCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
