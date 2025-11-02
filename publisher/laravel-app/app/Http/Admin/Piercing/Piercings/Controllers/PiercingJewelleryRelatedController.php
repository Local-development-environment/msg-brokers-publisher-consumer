<?php
declare(strict_types=1);

namespace App\Http\Admin\Piercing\Piercings\Controllers;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Piercings\Piercings\Services\Relationships\PiercingJewelleryRelationshipService;
use Illuminate\Http\JsonResponse;

final class PiercingJewelleryRelatedController extends Controller
{
    public function __construct(public PiercingJewelleryRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new JewelleryResource($model))->response();
    }
}
