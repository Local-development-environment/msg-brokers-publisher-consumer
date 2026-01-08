<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\ImitationStones\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class ImitationStoneCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
