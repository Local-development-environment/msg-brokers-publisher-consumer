<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Bracelets\Bracelets\Services\Relationships\BraceletJewelleryRelationshipService;
use Illuminate\Http\JsonResponse;

final class BraceletJewelleryRelatedController extends Controller
{
    public function __construct(public BraceletJewelleryRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new JewelleryResource($model))->response();
    }
}
