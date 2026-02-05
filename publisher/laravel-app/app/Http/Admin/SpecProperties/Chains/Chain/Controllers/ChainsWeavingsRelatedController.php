<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Chains\Chain\Controllers;

use App\Http\Admin\SharedProperty\Weaving\Resources\WeavingCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Services\Relationships\ChainsWeavingsRelationshipService;

final class ChainsWeavingsRelatedController extends Controller
{
    public function __construct(public ChainsWeavingsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new WeavingCollection($collection))->response();
    }
}
