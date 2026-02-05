<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Stones\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\Stones\Services\Relationships\StonesTypeOriginStoneRelationshipService;

final class StonesTypeOriginStoneRelationshipController extends Controller
{
    public function __construct(public StonesTypeOriginStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
