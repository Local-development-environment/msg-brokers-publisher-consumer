<?php

declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneItemGrades\Controllers;

use App\Http\Admin\Insert\StoneItemGrades\Resources\StoneItemGradeCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JewelleryDomain\Jewelleries\Inserts\StoneItemGrades\Services\StoneItemGradeService;

final class StoneItemGradeController extends Controller
{
    public function __construct(private readonly StoneItemGradeService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new StoneItemGradeCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {

    }
}
