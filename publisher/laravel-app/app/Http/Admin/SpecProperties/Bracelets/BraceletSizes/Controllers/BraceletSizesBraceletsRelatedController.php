<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\BraceletSizes\Controllers;

use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Resources\BraceletCollection;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Services\Relationships\BraceletSizesBraceletsRelationshipService;
use Illuminate\Http\JsonResponse;

final class BraceletSizesBraceletsRelatedController extends Controller
{
    public function __construct(public BraceletSizesBraceletsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new BraceletCollection($collection))->response();
    }
}
