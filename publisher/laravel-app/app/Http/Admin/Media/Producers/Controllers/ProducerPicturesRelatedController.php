<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Producers\Controllers;

use App\Http\Admin\Media\MediaPictures\Pictures\Resources\PictureCollection;
use App\Http\Controllers\Controller;
use Domain\Medias\Shared\Producers\Services\Relationships\ProducerPicturesRelationshipService;
use Illuminate\Http\JsonResponse;

final class ProducerPicturesRelatedController extends Controller
{
    public function __construct(public ProducerPicturesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new PictureCollection($collection))->response();
    }
}
