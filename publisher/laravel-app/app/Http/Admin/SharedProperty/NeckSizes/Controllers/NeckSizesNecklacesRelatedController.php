<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\NeckSizes\Controllers;

use App\Http\Admin\SpecProperties\Necklaces\Necklace\Resources\NecklaceCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Services\Relationships\NeckSizesNecklacesRelationshipService;

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
