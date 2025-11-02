<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\MediaVideos\Videos\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Medias\MediaVideos\Videos\Services\Relationships\VideosProducerRelationshipService;
use Illuminate\Http\JsonResponse;

final class VideosProducerRelationshipController extends Controller
{
    public function __construct(public VideosProducerRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
