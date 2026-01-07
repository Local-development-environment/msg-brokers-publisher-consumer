<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\BeadBase\Controllers;

use App\Http\Admin\SpecProperties\Beads\Bead\Resources\BeadCollection;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\BeadBases\Services\Relationships\BeadBaseBeadsRelationshipService;
use Illuminate\Http\JsonResponse;

final class BeadBaseBeadsRelatedController extends Controller
{
    public function __construct(public BeadBaseBeadsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new BeadCollection($collection))->response();
    }
}
