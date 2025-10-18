<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\NeckSizes\Controllers;

use App\Http\Admin\NecklaceProperty\Necklaces\Resources\NecklaceCollection;
use App\Http\Controllers\Controller;
use Domain\Shared\JewelleryProperties\NeckSizes\Services\Relationships\NeckSizesNecklacesRelationshipService;
use Illuminate\Http\JsonResponse;

final class NeckSizesNecklacesRelatedController extends Controller
{
    public function __construct(public NeckSizesNecklacesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new NecklaceCollection($collection))->response();
    }
}
