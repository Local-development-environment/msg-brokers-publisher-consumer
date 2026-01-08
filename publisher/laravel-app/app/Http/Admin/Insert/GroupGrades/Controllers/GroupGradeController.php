<?php

declare(strict_types=1);

namespace App\Http\Admin\Insert\GroupGrades\Controllers;

use App\Http\Admin\Insert\GroupGrades\Resources\GroupGradeCollection;
use App\Http\Admin\Insert\GroupGrades\Resources\GroupGradeResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\GroupGrades\Services\GroupGradeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class GroupGradeController extends Controller
{
    public function __construct(public GroupGradeService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new GroupGradeCollection($items))->response();
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
    public function show(Request $request, int $id): JsonResponse
    {
        $data = $request->all();

        data_set($data, 'id', $id);
        $model = $this->service->show($data, $id);

        return (new GroupGradeResource($model))->response();
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
