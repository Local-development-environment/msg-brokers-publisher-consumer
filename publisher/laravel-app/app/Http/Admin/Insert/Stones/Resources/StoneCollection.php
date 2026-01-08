<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Stones\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class StoneCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
