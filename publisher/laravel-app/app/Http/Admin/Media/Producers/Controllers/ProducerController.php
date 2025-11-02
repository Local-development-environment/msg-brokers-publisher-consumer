<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Producers\Controllers;

use App\Http\Admin\Media\Producers\Requests\ProducerStoreRequest;
use App\Http\Admin\Media\Producers\Requests\ProducerUpdateRequest;
use App\Http\Admin\Media\Producers\Resources\ProducerCollection;
use App\Http\Admin\Media\Producers\Resources\ProducerResource;
use App\Http\Controllers\Controller;
use Domain\Medias\Shared\Producers\Enums\ProducerNameRoutesEnum;
use Domain\Medias\Shared\Producers\Services\ProducerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

final class ProducerController extends Controller
{
    public function __construct(public ProducerService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new ProducerCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(ProducerStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new ProducerResource($model))
            ->response()
            ->header('Location', route(ProducerNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new ProducerResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(ProducerUpdateRequest $request, int $id): JsonResponse
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
