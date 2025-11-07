<?php
declare(strict_types=1);

namespace App\Http\Admin\ChainProperty\ChainWeavings\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class ChainWeavingCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
