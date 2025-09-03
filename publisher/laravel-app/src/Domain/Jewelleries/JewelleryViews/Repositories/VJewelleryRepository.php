<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\Repositories;

use Domain\Jewelleries\JewelleryViews\Models\VJewellery;
use Domain\Shared\CustomFilters\MetalFilter;
use Domain\Shared\CustomFilters\PriceFilter;
use Domain\Shared\CustomFilters\StoneFilter;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class VJewelleryRepository implements VJewelleryCachedRepositoryInterface
{
    public function index(array $params): Collection
    {
        $request = app()['request'];

        $data = $this->getVJewelleryBuilder($request)
            ->allowedSorts(['id', 'weight'])
            ->paginate($params['per_page'] ?? null)
            ->appends($params);

        $menu = [
            'categories' => $this->getCategoryMenu($params),
            'price' => $this->getPriceMenu($params),
            'metals' => $this->getMetalMenu($params),
        ];

        return collect([
            'data' => $data,
            'menu' => $menu
        ]);
    }

    public function show(array $params, int $id): VJewellery
    {
        return QueryBuilder::for(VJewellery::class)
            ->where('id', $id)
//            ->allowedIncludes(['jewelleryView'])
            ->firstOrFail();
    }

    private function getCategoryMenu(array $params): array
    {
        $request = app()['request'];
        $newRequest = Request::createFrom($request);
        $newRequest->merge($this->removeFilter($params, 'category_id'));

        return $this->getVJewelleryBuilder($newRequest)
            ->join('jewelleries.categories as jc', 'category_id', '=', 'jc.id')
            ->select('jc.id', 'jc.name')
            ->groupBy('jc.id')
            ->get()
            ->toArray();
    }

    private function getPriceMenu(array $params): array
    {
        $request = app()['request'];
        $newRequest = Request::createFrom($request);
        $newRequest->merge($this->removeFilter($params, 'price'));

        return $this->getVJewelleryBuilder($newRequest)
            ->select(DB::raw('max(max_price) as max_price, min(min_price) as min_price'))
            ->get()
            ->toArray();
    }

    private function getMetalMenu(array $params): array
    {
        $request = app()['request'];
        $newRequest = Request::createFrom($request);
        $newRequest->merge($this->removeFilter($params, 'metal_id'));

        return $this->getVJewelleryBuilder($newRequest)
            ->selectRaw('distinct m.id, m.name')
            ->crossJoin(DB::raw(
                "JSON_TABLE(
                metals,
                '$[*]'
                COLUMNS(
                    id INT PATH '$[*].metal_id',
                    name varchar(50) PATH '$[*].metal'
                )
            ) m"
            ))
            ->get()
            ->toArray()
            ;

    }

    private function getVJewelleryBuilder(Request $request): QueryBuilder
    {
        return QueryBuilder::for(VJewellery::query(), $request)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('part_number'),
                AllowedFilter::exact('category_id'),
                AllowedFilter::exact('approx_weight'),
                AllowedFilter::custom('price', new PriceFilter),
                AllowedFilter::custom('metal_id', new MetalFilter),
                'is_active', 'jewellery'
            ]);
    }

    private function removeFilter(array $params, string $filterName): array
    {
        $filters = data_get($params, 'filter');

        if (array_key_exists($filterName, $filters) !== null) {
            Arr::forget($params, 'filter.' . $filterName);
        }

//        if ($filters) {
//            if (count($filters) > 1) {
//                $lastKey = array_key_last($filters);
//                Arr::forget($data, 'filter.' . $lastKey);
//            } else {
//                Arr::forget($data, 'filter');
//            }
//        }

        return $params;
    }
}