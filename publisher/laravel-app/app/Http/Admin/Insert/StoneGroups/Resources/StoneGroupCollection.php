<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneGroups\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class StoneGroupCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
