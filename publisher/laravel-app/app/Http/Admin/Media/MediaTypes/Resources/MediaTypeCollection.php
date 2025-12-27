<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\MediaTypes\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class MediaTypeCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
