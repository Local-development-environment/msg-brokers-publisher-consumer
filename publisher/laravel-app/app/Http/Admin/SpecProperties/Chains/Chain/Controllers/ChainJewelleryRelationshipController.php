<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Chains\Chain\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Services\Relationships\ChainJewelleryRelationshipService;

final class ChainJewelleryRelationshipController extends Controller
{
    public function __construct(public ChainJewelleryRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);
        return (new ApiEntityIdentifierResource($model))->response();
    }
}
