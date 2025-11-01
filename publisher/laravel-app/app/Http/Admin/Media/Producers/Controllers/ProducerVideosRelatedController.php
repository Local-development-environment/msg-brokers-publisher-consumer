<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Producers\Controllers;

use App\Http\Admin\Media\MediaVideos\Videos\Resources\VideoCollection;
use App\Http\Controllers\Controller;
use Domain\Medias\Shared\Producers\Services\Relationships\ProducerVideosRelationshipService;
use Illuminate\Http\JsonResponse;

final class ProducerVideosRelatedController extends Controller
{
    public function __construct(public ProducerVideosRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new VideoCollection($collection))->response();
    }
}
