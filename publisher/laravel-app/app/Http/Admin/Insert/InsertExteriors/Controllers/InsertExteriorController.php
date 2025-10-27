<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\InsertExteriors\Controllers;

use App\Http\Admin\Insert\InsertExteriors\Resources\InsertExteriorCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\InsertExteriors\Services\InsertExteriorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class InsertExteriorController extends Controller
{
    public function __construct(public InsertExteriorService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new InsertExteriorCollection($items))->response();
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
