<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\Weaving\Controllers;

use App\Http\Admin\SharedProperty\Weaving\Resources\WeavingCollection;
use App\Http\Controllers\Controller;
use Domain\Shared\JewelleryProperties\Weavings\Services\WeavingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class WeavingController extends Controller
{
    public function __construct(public WeavingService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new WeavingCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
