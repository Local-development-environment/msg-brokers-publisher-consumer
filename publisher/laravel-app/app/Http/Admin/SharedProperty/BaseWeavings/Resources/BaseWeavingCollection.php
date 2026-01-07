<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\BaseWeavings\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class BaseWeavingCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
