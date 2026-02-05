<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers;

use App\Http\Admin\SpecProperties\Bracelets\BraceletSizes\Resources\BraceletSizeCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Services\Relationships\BraceletsBraceletSizesRelationshipService;

final class BraceletsBraceletSizesRelatedController extends Controller
{
    public function __construct(public BraceletsBraceletSizesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new BraceletSizeCollection($collection))->response();
    }
}
