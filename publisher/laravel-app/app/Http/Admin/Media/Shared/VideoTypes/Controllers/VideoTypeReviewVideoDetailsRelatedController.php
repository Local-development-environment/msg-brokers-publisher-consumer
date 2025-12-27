<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Shared\VideoTypes\Controllers;

use App\Http\Admin\Media\ReviewMedias\ReviewVideoDetails\Resources\ReviewVideoDetailCollection;
use App\Http\Controllers\Controller;
use Domain\Medias\ReviewMedias\ReviewVideoDetails\Services\Relationships\ReviewVideoDetailReviewVideoRelationshipService;
use Illuminate\Http\JsonResponse;

final class VideoTypeReviewVideoDetailsRelatedController extends Controller
{
    public function __construct(public ReviewVideoDetailReviewVideoRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new ReviewVideoDetailCollection($collection))->response();
    }
}
