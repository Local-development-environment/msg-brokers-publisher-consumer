<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Shared\VideoTypes\Controllers;

use App\Http\Admin\Media\MediaVideos\VideoDetails\Resources\VideoDetailCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Services\Relationships\VideoTypeCatalogVideoDetailsRelationshipService;

final class VideoTypeCatalogVideoDetailsRelatedController extends Controller
{
    public function __construct(public VideoTypeCatalogVideoDetailsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new VideoDetailCollection($collection))->response();
    }
}
