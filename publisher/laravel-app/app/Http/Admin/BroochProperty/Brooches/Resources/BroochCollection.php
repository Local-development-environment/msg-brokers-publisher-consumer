<?php
declare(strict_types=1);

namespace App\Http\Admin\BroochProperty\Brooches\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class BroochCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
