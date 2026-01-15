<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\Bead\Controllers;

use App\Http\Admin\SpecProperties\Beads\BeadBase\Resources\BeadBaseResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\Beads\Services\Relationships\BeadsBeadBaseRelationshipService;
use Illuminate\Http\JsonResponse;

final class BeadsBeadBaseRelatedController extends Controller
{
    public function __construct(public BeadsBeadBaseRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new BeadBaseResource($model))->response();
    }
}
