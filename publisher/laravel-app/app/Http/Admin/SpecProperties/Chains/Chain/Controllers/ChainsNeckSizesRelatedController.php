<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Chains\Chain\Controllers;

use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeCollection;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Chains\Chains\Services\Relationships\ChainsNeckSizesRelationshipService;
use Illuminate\Http\JsonResponse;

final class ChainsNeckSizesRelatedController extends Controller
{
    public function __construct(public ChainsNeckSizesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new NeckSizeCollection($collection))->response();
    }
}
