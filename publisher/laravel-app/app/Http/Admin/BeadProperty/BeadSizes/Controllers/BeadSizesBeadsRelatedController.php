<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\BeadSizes\Controllers;

use App\Http\Admin\BeadProperty\Beads\Resources\BeadCollection;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\BeadSizes\Services\Relationships\BeadSizesBeadsRelationshipService;
use Illuminate\Http\JsonResponse;

final class BeadSizesBeadsRelatedController extends Controller
{
    public function __construct(public BeadSizesBeadsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new BeadCollection($collection))->response();
    }
}
