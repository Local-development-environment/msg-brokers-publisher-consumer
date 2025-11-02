<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\MediaVideos\VideoDetails\Controllers;

use App\Http\Admin\Media\MediaVideos\Videos\Resources\VideoResource;
use App\Http\Controllers\Controller;
use Domain\Medias\MediaVideos\VideoDetails\Services\Relationships\VideoDetailsVideoRelationshipService;
use Illuminate\Http\JsonResponse;

final class VideoDetailsVideoRelatedController extends Controller
{
    public function __construct(public VideoDetailsVideoRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new VideoResource($model))->response();
    }
}
