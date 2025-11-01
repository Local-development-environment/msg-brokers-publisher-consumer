<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\MediaVideos\VideoTypes\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Medias\MediaVideos\VideoTypes\Services\VideoTypeVideoDetailsRelationshipService;
use Illuminate\Http\JsonResponse;

final class VideoTypeVideoDetailsRelationshipController extends Controller
{
    public function __construct(public VideoTypeVideoDetailsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);
        return (ApiEntityIdentifierResource::collection($model))->response();
    }
}
