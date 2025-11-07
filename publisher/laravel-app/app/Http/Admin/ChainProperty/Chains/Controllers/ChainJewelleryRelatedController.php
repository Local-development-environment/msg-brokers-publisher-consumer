<?php
declare(strict_types=1);

namespace App\Http\Admin\ChainProperty\Chains\Controllers;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Chains\Chains\Services\Relationships\ChainJewelleryRelationshipService;
use Illuminate\Http\JsonResponse;

final class ChainJewelleryRelatedController extends Controller
{
    public function __construct(public ChainJewelleryRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new JewelleryResource($model))->response();
    }
}
