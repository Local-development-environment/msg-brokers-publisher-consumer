<?php
declare(strict_types=1);

namespace app\Http\Admin\SpecProperties\Brooches\Brooch\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Brooches\Brooches\Services\Relationships\BroochJewelleryRelationshipService;
use Illuminate\Http\JsonResponse;

final class BroochJewelleryRelationshipController extends Controller
{
    public function __construct(public BroochJewelleryRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);
        return (new ApiEntityIdentifierResource($model))->response();
    }
}
