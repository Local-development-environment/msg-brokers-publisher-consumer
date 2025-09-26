<?php

namespace App\Http\Admin\Insert\StoneGrades\Controllers;

use App\Http\Admin\Insert\StoneGrades\Resources\StoneGradeCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\StoneGrades\Models\StoneGrade;
use Domain\Inserts\StoneGrades\Services\StoneGradeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoneGradeController extends Controller
{
    public function __construct(private StoneGradeService $service, private StoneGrade $stoneGrade)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new StoneGradeCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', $this->stoneGrade);
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
        $this->authorize('update', $this->stoneGrade);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete', $this->stoneGrade);
    }
}
