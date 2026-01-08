<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\LengthNames\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class LengthNameCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
