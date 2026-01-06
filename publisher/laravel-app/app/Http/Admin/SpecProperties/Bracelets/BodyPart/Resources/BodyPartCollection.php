<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\BodyPart\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class BodyPartCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
