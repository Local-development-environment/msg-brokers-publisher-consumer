<?php
declare(strict_types=1);

namespace App\Http\Admin\Piercing\Piercings\Controllers;

use App\Http\Admin\Piercing\Piercings\Requests\PiercingStoreRequest;
use App\Http\Admin\Piercing\Piercings\Requests\PiercingUpdateRequest;
use App\Http\Admin\Piercing\Piercings\Resources\PiercingCollection;
use App\Http\Admin\Piercing\Piercings\Resources\PiercingResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Piercings\Piercings\Enums\PiercingEnum;
use Domain\JewelleryProperties\Piercings\Piercings\Enums\PiercingNameRoutesEnum;
use Domain\JewelleryProperties\Piercings\Piercings\Services\PiercingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

final class PiercingController extends Controller
{
    public function __construct(public PiercingService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new PiercingCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(PiercingStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new PiercingResource($model))
            ->response()
            ->header('Location', route(PiercingNameRoutesEnum::CRUD_SHOW->value, [
                PiercingEnum::PRIMARY_KEY->value => $model->id
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

        return (new PiercingResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(PiercingUpdateRequest $request, int $id): JsonResponse
    {
        $data = $request->all();

        $this->service->update($data, $id);

        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     * @throws Throwable
     */
    public function destroy(int $id): JsonResponse
    {
        $this->service->destroy($id);

        return response()->json(null, 204);
    }
}
