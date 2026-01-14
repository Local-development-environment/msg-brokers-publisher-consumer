<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Necklaces\Necklace\Controllers;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Necklaces\Necklaces\Services\Relationships\NecklaceJewelleryRelationshipService;
use Illuminate\Http\JsonResponse;

final class NecklaceJewelleryRelatedController extends Controller
{
    public function __construct(public NecklaceJewelleryRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new JewelleryResource($model))->response();
    }
}
