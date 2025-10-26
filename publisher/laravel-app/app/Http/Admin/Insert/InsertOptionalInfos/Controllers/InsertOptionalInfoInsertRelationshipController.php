<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\InsertOptionalInfos\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\InsertOptionalInfos\Services\Relationships\InsertOptionalInfoInsertRelationshipService;
use Illuminate\Http\JsonResponse;

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
