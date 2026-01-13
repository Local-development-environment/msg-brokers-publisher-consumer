<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\TieClips\TieClip\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class TieClipCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
