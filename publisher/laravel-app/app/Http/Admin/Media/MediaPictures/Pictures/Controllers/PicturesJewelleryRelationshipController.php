<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\MediaPictures\Pictures\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Medias\MediaPictures\Pictures\Services\Relationships\PicturesJewelleryRelationshipService;
use Illuminate\Http\JsonResponse;

final class PicturesJewelleryRelationshipController extends Controller
{
    public function __construct(public PicturesJewelleryRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
