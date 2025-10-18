<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\NeckSizes\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Shared\JewelleryProperties\NeckSizes\Services\Relationships\NeckSizesLengthNameRelationshipService;
use Illuminate\Http\JsonResponse;

final class NeckSizesLengthNameRelationshipController extends Controller
{
    public function __construct(public NeckSizesLengthNameRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);
        return (new ApiEntityIdentifierResource($model))->response();
    }
}
