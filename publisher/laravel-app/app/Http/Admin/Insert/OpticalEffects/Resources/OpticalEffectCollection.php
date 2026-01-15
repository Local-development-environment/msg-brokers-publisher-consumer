<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\OpticalEffects\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class OpticalEffectCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
