<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\Repositories;

use Domain\Jewelleries\JewelleryViews\Models\VJewellery;
use Domain\Shared\CustomFilters\CoverageFilter;
use Domain\Shared\CustomFilters\FamilyFilter;
use Domain\Shared\CustomFilters\MetalFilter;
use Domain\Shared\CustomFilters\PriceFilter;
use Domain\Shared\CustomFilters\StoneFilter;
use Domain\Shared\Repositories\AbstractMenuRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class VJewelleryRepository extends AbstractMenuRepository implements VJewelleryCachedRepositoryInterface
{
    private array $menu;

    public function index(array $params): Collection
    {
        $request = app()['request'];
//        dd($params);
        $data = $this->getVJewelleryBuilder($request)
            ->allowedSorts(['id', 'weight'])
            ->paginate($params['per_page'] ?? null)
            ->appends($params);

        $this->menu = [
            'categories' => $this->getCategoryMenu($params),
            'price' => $this->getPriceMenu($params),
            'metals' => $this->getMetalMenu($params),
            'coverages' => $this->getCoverageMenu($params),
            'inserts' => [
                'stones' => $this->getStoneMenu($params),
                'families' => $this->getFamilyMenu($params),
            ]
        ];

        return collect([
            'data' => $data,
            'menu' => $this->menu
        ]);
    }

    public function show(array $params, int $id): VJewellery
    {
        return QueryBuilder::for(VJewellery::class)
            ->where('id', $id)
            ->firstOrFail();
    }

    private function getCategoryMenu(array $params): array
    {
        return $this->getVJewelleryBuilder($this->getRequestWithoutFilterItem($params, 'category_id'))
            ->join('jewelleries.categories as jc', 'category_id', '=', 'jc.id')
            ->select('jc.id', 'jc.name')
            ->groupBy('jc.id')
            ->get()
            ->toArray();
    }

    private function getPriceMenu(array $params): array
    {
        return $this->getVJewelleryBuilder($this->getRequestWithoutFilterItem($params, 'price'))
            ->select(DB::raw('max(max_price) as max_price, min(min_price) as min_price'))
            ->get()
            ->toArray();
    }

    private function getMetalMenu(array $params): array
    {
        return $this->getVJewelleryBuilder($this->getRequestWithoutFilterItem($params, 'metal_id'))
            ->selectRaw('distinct m.id, m.name')
            ->crossJoin(DB::raw(
                "JSON_TABLE(
                metals,
                '$[*]'
                COLUMNS(
                    id INT PATH '$.metal_id',
                    name varchar(50) PATH '$.metal'
                )
            ) m"
            ))
            ->get()
            ->toArray();
    }

    private function getCoverageMenu(array $params): array
    {
        return $this->getVJewelleryBuilder($this->getRequestWithoutFilterItem($params, 'coverage_id'))
            ->selectRaw('distinct c.id, c.name')
            ->crossJoin(DB::raw(
                "JSON_TABLE(
                coverages,
                '$[*]'
                COLUMNS(
                    id INT PATH '$.coverage_id',
                    name varchar(50) PATH '$.coverage'
                )
            ) c"
            ))
            ->get()
            ->toArray();
    }

    private function getStoneMenu(array $params): array
    {
        $query = $this->getVJewelleryBuilder($this->getRequestWithoutFilterItem($params, 'stone_id'))
            ->selectRaw('distinct s.id, s.name, s.family_id')
            ->crossJoin(DB::raw(
                "JSON_TABLE(
                inserts,
                '$[*]'
                COLUMNS(
                    id INT PATH '$.stone.id',
                    name varchar(50) PATH '$.stone.name',
                    family_id int path '$.family.id'
                )
            ) s"
            ));

        if (isset($params['filter'])) {
            if (array_key_exists('family_id', $params['filter'])) {
                return $query->whereIn('s.family_id', explode(',', $params['filter']['family_id']))->get()->toArray();
            } else {
                return $query->get()->toArray();
            }
        } else {
            return $query->get()->toArray();
        }
    }

    private function getFamilyMenu(array $params): array
    {
        $query = $this->getVJewelleryBuilder($this->getRequestWithoutFilterItem($params, 'family_id'))
            ->selectRaw('distinct f.id, f.name')
            ->crossJoin(DB::raw(
                "JSON_TABLE(
                inserts,
                '$[*]'
                COLUMNS(
                    id INT PATH '$.family.id',
                    name varchar(50) PATH '$.family.name',
                    stone_id int path '$.stone.id'
                )
            ) f"
            ));

        if (isset($params['filter'])) {
            if (array_key_exists('stone_id', $params['filter'])) {
                return $query->whereIn('f.stone_id', explode(',', $params['filter']['stone_id']))->get()->toArray();
            } else {
                return $query->get()->toArray();
            }
        } else {
            return $query->get()->toArray();
        }
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
                AllowedFilter::custom('coverage_id', new CoverageFilter),
                AllowedFilter::custom('stone_id', new StoneFilter),
                AllowedFilter::custom('family_id', new FamilyFilter),
                'is_active', 'jewellery'
            ]);
    }
}