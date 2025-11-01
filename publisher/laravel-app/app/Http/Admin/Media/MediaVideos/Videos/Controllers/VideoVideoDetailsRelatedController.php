<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\MediaVideos\Videos\Controllers;

use App\Http\Admin\Media\MediaVideos\VideoDetails\Resources\VideoDetailCollection;
use App\Http\Controllers\Controller;
use Domain\Medias\MediaVideos\Videos\Services\Relationships\VideoVideoDetailsRelationshipService;
use Illuminate\Http\JsonResponse;

final class VideoVideoDetailsRelatedController extends Controller
{
    public function __construct(public VideoVideoDetailsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new VideoDetailCollection($collection))->response();
    }
}
