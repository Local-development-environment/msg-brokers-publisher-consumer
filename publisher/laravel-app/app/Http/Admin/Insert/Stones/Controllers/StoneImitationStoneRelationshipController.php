<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Stones\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\Stones\Services\Relationships\StoneImitationStoneRelationshipService;

final class StoneImitationStoneRelationshipController extends Controller
{
    public function __construct(public StoneImitationStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse|null
    {
        $model = $this->service->index($id);

        return $model ? (new ApiEntityIdentifierResource($model))->response() : response()->json()->setStatusCode(204);
    }
}
