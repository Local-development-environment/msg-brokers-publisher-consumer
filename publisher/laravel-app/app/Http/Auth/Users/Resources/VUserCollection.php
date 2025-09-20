<?php
declare(strict_types=1);

namespace App\Http\Auth\Users\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VUserCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
