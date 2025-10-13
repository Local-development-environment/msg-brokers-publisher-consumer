<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\Beads\Controllers;

use App\Http\Admin\BeadProperty\BeadSizes\Resources\BeadSizeCollection;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\Beads\Services\Relationships\BeadsBeadSizesRelationshipService;
use Illuminate\Http\JsonResponse;

final class BeadsBeadSizesRelatedController extends Controller
{
    public function __construct(public BeadsBeadSizesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new BeadSizeCollection($collection))->response();
    }
}
