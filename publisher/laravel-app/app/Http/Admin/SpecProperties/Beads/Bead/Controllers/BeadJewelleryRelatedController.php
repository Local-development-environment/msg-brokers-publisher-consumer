<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\Bead\Controllers;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\Beads\Services\Relationships\BeadJewelleryRelationshipService;
use Illuminate\Http\JsonResponse;

final class BeadJewelleryRelatedController extends Controller
{
    public function __construct(public BeadJewelleryRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new JewelleryResource($model))->response();
    }
}
