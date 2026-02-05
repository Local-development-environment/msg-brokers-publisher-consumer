<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\InsertOptionalInfos\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\InsertOptionalInfos\Services\Relationships\InsertOptionalInfoInsertRelationshipService;

final class InsertOptionalInfoInsertRelationshipController extends Controller
{
    public function __construct(public InsertOptionalInfoInsertRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
