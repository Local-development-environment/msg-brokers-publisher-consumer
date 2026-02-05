<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Shared\VideoTypes\Controllers;

use App\Http\Admin\Media\ReviewMedias\ReviewVideoDetails\Resources\ReviewVideoDetailCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewVideoDetails\Services\Relationships\ReviewVideoDetailReviewVideoRelationshipService;

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
