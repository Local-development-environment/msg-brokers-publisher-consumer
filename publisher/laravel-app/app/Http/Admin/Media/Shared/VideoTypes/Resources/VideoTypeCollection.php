<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Shared\VideoTypes\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class VideoTypeCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
