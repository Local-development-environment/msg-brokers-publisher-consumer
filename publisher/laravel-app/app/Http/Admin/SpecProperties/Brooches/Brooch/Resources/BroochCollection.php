<?php
declare(strict_types=1);

namespace app\Http\Admin\SpecProperties\Brooches\Brooch\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class BroochCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
