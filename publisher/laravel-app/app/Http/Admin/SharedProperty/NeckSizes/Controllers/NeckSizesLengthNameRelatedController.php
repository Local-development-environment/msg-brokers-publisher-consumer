<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\NeckSizes\Controllers;

use App\Http\Admin\SharedProperty\LengthNames\Resources\LengthNameResource;
use App\Http\Controllers\Controller;
use Domain\Shared\JewelleryProperties\NeckSizes\Services\Relationships\NeckSizesLengthNameRelationshipService;
use Illuminate\Http\JsonResponse;

final class NeckSizesLengthNameRelatedController extends Controller
{
    public function __construct(public NeckSizesLengthNameRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new LengthNameResource($model))->response();
    }
}
