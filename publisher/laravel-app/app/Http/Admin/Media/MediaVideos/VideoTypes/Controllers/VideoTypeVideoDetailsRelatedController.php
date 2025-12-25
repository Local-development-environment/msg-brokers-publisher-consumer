<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\MediaVideos\VideoTypes\Controllers;

use App\Http\Admin\Media\MediaVideos\VideoDetails\Resources\VideoDetailCollection;
use App\Http\Controllers\Controller;
use Domain\Medias\Shared\MediaTypes\Services\VideoTypeVideoDetailsRelationshipService;
use Illuminate\Http\JsonResponse;

final class VideoTypeVideoDetailsRelatedController extends Controller
{
    public function __construct(public VideoTypeVideoDetailsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new VideoDetailCollection($collection))->response();
    }
}
