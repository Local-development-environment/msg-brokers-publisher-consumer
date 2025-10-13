<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\BeadSizes\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Beads\BeadSizes\Services\Relationships\BeadSizesLengthNameRelationshipService;
use Illuminate\Http\JsonResponse;

final class BeadSizesLengthNameRelationshipController extends Controller
{
    public function __construct(public BeadSizesLengthNameRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);
        return (new ApiEntityIdentifierResource($model))->response();
    }
}
