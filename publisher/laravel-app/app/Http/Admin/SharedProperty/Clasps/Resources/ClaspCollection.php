<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\Clasps\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class ClaspCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
