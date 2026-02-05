<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Inserts\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\Inserts\Services\Relationships\InsertInsertOptionalInfoRelationshipService;

final class InsertInsertOptionalInfoRelationshipController extends Controller
{
    public function __construct(public InsertInsertOptionalInfoRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        if ($model) {
            return (new ApiEntityIdentifierResource($model))->response();
        }else {
            return response()->json(null, 204);
        }
    }
}
