<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\Weaving\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class WeavingCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
