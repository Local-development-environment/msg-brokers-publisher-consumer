<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\NeckSizes\Controllers;

use App\Http\Admin\SharedProperty\LengthNames\Resources\LengthNameResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Services\Relationships\NeckSizesLengthNameRelationshipService;

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
