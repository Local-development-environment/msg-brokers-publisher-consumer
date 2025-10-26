<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\InsertOptionalInfos\Controllers;

use App\Http\Admin\Insert\Inserts\Resources\InsertResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\InsertOptionalInfos\Services\Relationships\InsertOptionalInfoInsertRelationshipService;
use Illuminate\Http\JsonResponse;

final class InsertOptionalInfoInsertRelatedController extends Controller
{
    public function __construct(public InsertOptionalInfoInsertRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new InsertResource($model))->response();
    }
}
