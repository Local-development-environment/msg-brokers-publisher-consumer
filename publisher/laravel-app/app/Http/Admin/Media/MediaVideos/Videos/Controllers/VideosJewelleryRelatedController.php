<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\MediaVideos\Videos\Controllers;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Controllers\Controller;
use Domain\Medias\MediaVideos\Videos\Services\Relationships\VideosJewelleryRelationshipService;
use Illuminate\Http\JsonResponse;

final class VideosJewelleryRelatedController extends Controller
{
    public function __construct(public VideosJewelleryRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new JewelleryResource($model))->response();
    }
}
