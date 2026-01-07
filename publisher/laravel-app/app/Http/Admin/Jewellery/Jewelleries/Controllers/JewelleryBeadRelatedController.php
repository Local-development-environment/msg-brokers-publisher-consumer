<?php
declare(strict_types=1);

namespace App\Http\Admin\Jewellery\Jewelleries\Controllers;

use App\Http\Admin\SpecProperties\Beads\Bead\Resources\BeadResource;
use App\Http\Controllers\Controller;
use Domain\Jewelleries\Jewelleries\Services\Relationships\JewelleryBeadRelationshipService;
use Illuminate\Http\JsonResponse;

final class JewelleryBeadRelatedController extends Controller
{
    public function __construct(public JewelleryBeadRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new BeadResource($model))->response();
    }
}
