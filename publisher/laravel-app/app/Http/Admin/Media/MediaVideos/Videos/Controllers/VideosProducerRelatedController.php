<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\MediaVideos\Videos\Controllers;

use App\Http\Admin\Media\Producers\Resources\ProducerResource;
use App\Http\Controllers\Controller;
use Domain\Medias\MediaVideos\Videos\Services\Relationships\VideosProducerRelationshipService;
use Illuminate\Http\JsonResponse;

final class VideosProducerRelatedController extends Controller
{
    public function __construct(public VideosProducerRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ProducerResource($model))->response();
    }
}
