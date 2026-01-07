<?php
declare(strict_types=1);

namespace app\Http\Admin\SpecProperties\Brooches\Brooch\Controllers;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Brooches\Brooches\Services\Relationships\BroochJewelleryRelationshipService;
use Illuminate\Http\JsonResponse;

final class BroochJewelleryRelatedController extends Controller
{
    public function __construct(public BroochJewelleryRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new JewelleryResource($model))->response();
    }
}
