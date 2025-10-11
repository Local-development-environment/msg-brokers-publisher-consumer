<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\Clasps\Controllers;

use App\Http\Admin\SharedProperty\Clasps\Requests\ClaspStoreRequest;
use App\Http\Admin\SharedProperty\Clasps\Requests\ClaspUpdateRequest;
use App\Http\Admin\SharedProperty\Clasps\Resources\ClaspCollection;
use App\Http\Admin\SharedProperty\Clasps\Resources\ClaspResource;
use App\Http\Controllers\Controller;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspNameRoutesEnum;
use Domain\Shared\JewelleryProperties\Clasps\Services\ClaspService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class ClaspController extends Controller
{
    public function __construct(public ClaspService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new ClaspCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws \Throwable
     */
    public function store(ClaspStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new ClaspResource($model))
            ->response()
            ->header('Location', route(ClaspNameRoutesEnum::CRUD_SHOW->value, [
                'id' => $model->id
            ]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $id): JsonResponse
    {
        $data = $request->all();
        data_set($data, 'id', $id);
        $model = $this->service->show($data, $id);

        return (new ClaspResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws \Throwable
     */
    public function update(ClaspUpdateRequest $request, int $id): JsonResponse
    {
        $data = $request->all();

        $this->service->update($data, $id);

        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     * @throws \Throwable
     */
    public function destroy(int $id): JsonResponse
    {
        $this->service->destroy($id);

        return response()->json(null, 204);
    }
}
