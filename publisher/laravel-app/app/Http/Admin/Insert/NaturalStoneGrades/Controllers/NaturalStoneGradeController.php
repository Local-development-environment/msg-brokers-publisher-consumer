<?php

namespace App\Http\Admin\Insert\NaturalStoneGrades\Controllers;

use App\Http\Admin\Insert\NaturalStoneGrades\Resources\NaturalStoneGradeCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\NaturalStoneGrades\Models\NaturalStoneGrade;
use Domain\Inserts\NaturalStoneGrades\Services\NaturalStoneGradeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NaturalStoneGradeController extends Controller
{
    public function __construct(public NaturalStoneGradeService $service, public NaturalStoneGrade $naturalStoneGrade)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $this->authorize('viewAny', $this->naturalStoneGrade);

        $data = $request->all();
        $items = $this->service->index($data);

        return (new NaturalStoneGradeCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', $this->naturalStoneGrade);
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
        $this->authorize('update', $this->naturalStoneGrade);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete', $this->naturalStoneGrade);
    }
}
