<?php
declare(strict_types=1);

namespace App\Http\Admin\Piercing\Piercings\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class PiercingCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
