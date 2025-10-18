<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\Beads\Controllers;

use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeCollection;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\Beads\Services\Relationships\BeadsNeckSizesRelationshipService;
use Illuminate\Http\JsonResponse;

final class BeadsNeckSizesRelatedController extends Controller
{
    public function __construct(public BeadsNeckSizesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new NeckSizeCollection($collection))->response();
    }
}
