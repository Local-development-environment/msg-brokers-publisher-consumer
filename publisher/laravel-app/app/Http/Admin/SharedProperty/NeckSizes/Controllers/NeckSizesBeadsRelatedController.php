<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\NeckSizes\Controllers;

use App\Http\Admin\SpecProperties\Beads\Bead\Resources\BeadCollection;
use App\Http\Controllers\Controller;
use Domain\Shared\JewelleryProperties\NeckSizes\Services\Relationships\NeckSizesBeadsRelationshipService;
use Illuminate\Http\JsonResponse;

final class NeckSizesBeadsRelatedController extends Controller
{
    public function __construct(public NeckSizesBeadsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new BeadCollection($collection))->response();
    }
}
