<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Inserts\Controllers;

use App\Http\Admin\Insert\InsertOptionalInfos\Resources\InsertOptionalInfoResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\Inserts\Services\Relationships\InsertInsertOptionalInfoRelationshipService;
use Illuminate\Http\JsonResponse;

final class InsertInsertOptionalInfoRelatedController extends Controller
{
    public function __construct(public InsertInsertOptionalInfoRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        if ($model) {
            return (new InsertOptionalInfoResource($model))->response();
        }else {
            return response()->json(null, 204);
        }
    }
}
