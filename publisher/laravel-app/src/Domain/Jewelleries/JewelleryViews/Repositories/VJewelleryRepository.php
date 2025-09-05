<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\Repositories;

use Domain\Jewelleries\Categories\Enums\CategoryEnum;
use Domain\Jewelleries\JewelleryViews\Enums\VJewelleryEnum;
use Domain\Jewelleries\JewelleryViews\Enums\VJewelleryFilterEnum;
use Domain\Jewelleries\JewelleryViews\MenuFilters\CategoryMenuFilter;
use Domain\Jewelleries\JewelleryViews\Models\VJewellery;
use Domain\Shared\CustomFilters\ClassifierGroupFilter;
use Domain\Shared\CustomFilters\CoverageFilter;
use Domain\Shared\CustomFilters\FamilyFilter;
use Domain\Shared\CustomFilters\MetalFilter;
use Domain\Shared\CustomFilters\PriceFilter;
use Domain\Shared\CustomFilters\StoneFilter;
use Domain\Shared\Repositories\AbstractMenuFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class VJewelleryRepository extends AbstractMenuFilter implements VJewelleryCachedRepositoryInterface
{
    public function index(array $params): Collection
    {
        $request = app()['request'];

        $data = $this->getVJewelleryBuilder($request)
            ->allowedSorts(['id', 'weight'])
            ->paginate($params['per_page'] ?? null)
            ->appends($params);

        $menu = [
//            'categories' => $this->getCategoryMenu($params),
            'categories' => (new CategoryMenuFilter(
                $this->getVJewelleryBuilder($this->getRequestWithoutFilterItem($params, 'category_id'))
            ))->getCategoryMenu(),
            'price_range' => $this->getPriceRangeMenu($params),
            'metals' => $this->getMetalMenu($params),
            'coverages' => $this->getCoverageMenu($params),
            'inserts' => [
                'stones' => $this->getStoneMenu($params),
                'families' => $this->getFamilyMenu($params),
                'groups' => $this->getStoneGroupMenu($params),
            ]
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
            ->firstOrFail();
    }

//    private function getCategoryMenu(array $params): array
//    {
//        return $this->getVJewelleryBuilder($this->getRequestWithoutFilterItem($params, 'category_id'))
//            ->join(CategoryEnum::TABLE_NAME->value . ' as jc', VJewelleryEnum::FK_CATEGORY->value, '=', 'jc.id')
//            ->select('jc.id', 'jc.name')
//            ->groupBy('jc.id')
//            ->get()
//            ->toArray();
//    }

    private function getPriceRangeMenu(array $params): array
    {
        return $this->getVJewelleryBuilder($this->getRequestWithoutFilterItem($params, VJewelleryFilterEnum::PRICE_RANGE->value))
            ->select(DB::raw('max(max_price) as max_price, min(min_price) as min_price'))
            ->get()
            ->toArray();
    }

    private function getMetalMenu(array $params): array
    {
        return $this->getVJewelleryBuilder($this->getRequestWithoutFilterItem($params, VJewelleryFilterEnum::JSON_METAL->value))
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
        return $this->getVJewelleryBuilder($this->getRequestWithoutFilterItem($params, VJewelleryFilterEnum::JSON_COVERAGE->value))
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
        return $this->getVJewelleryBuilder($this->getRequestWithoutFilterItem($params, VJewelleryFilterEnum::JSON_STONE->value))
            ->selectRaw('distinct s.id, s.name')
            ->crossJoin(DB::raw(
                "JSON_TABLE(
                inserts,
                '$[*]'
                COLUMNS(
                    id INT PATH '$.stone.id',
                    name varchar(50) PATH '$.stone.name',
                    family_id int path '$.family.id',
                    group_id int path '$.classification.group_id'
                )
            ) s"
            ))
            ->join('jw_inserts.stone_families', 's.id', '=', 'jw_inserts.stone_families.id')
            ->get()
            ->toArray();
    }

    private function getFamilyMenu(array $params): array
    {
        return $this->getVJewelleryBuilder($this->getRequestWithoutFilterItem($params, VJewelleryFilterEnum::JSON_STONE_FAMILY->value))
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
            ))
            ->join('jw_inserts.stone_families', 'f.id', '=', 'jw_inserts.stone_families.id')
            ->get()
            ->toArray();
    }

    private function getStoneGroupMenu(array $params): array
    {
        return $this->getVJewelleryBuilder($this->getRequestWithoutFilterItem($params, VJewelleryFilterEnum::JSON_STONE_GROUP->value))
            ->selectRaw('distinct g.id, g.name')
            ->crossJoin(DB::raw(
                "JSON_TABLE(
                inserts,
                '$[*]'
                COLUMNS(
                    id INT PATH '$.classification.group_id',
                    name varchar(50) PATH '$.classification.group_name',
                    stone_id int path '$.stone.id'
                )
            ) g"
            ))
            ->join('jw_inserts.stone_groups', 'g.id', '=', 'jw_inserts.stone_groups.id')
            ->get()
            ->toArray();
    }

    private function getVJewelleryBuilder(Request $request): QueryBuilder
    {
        return QueryBuilder::for(VJewellery::query(), $request)
            ->allowedFilters([
                AllowedFilter::exact(VJewelleryFilterEnum::PK_ITSELF->value),
                AllowedFilter::exact(VJewelleryFilterEnum::PART_NUMBER->value),
                AllowedFilter::exact(VJewelleryFilterEnum::FK_CATEGORY->value),
                AllowedFilter::exact(VJewelleryFilterEnum::APPROX_WEIGHT->value),
                AllowedFilter::custom(VJewelleryFilterEnum::PRICE_RANGE->value, new PriceFilter),
                AllowedFilter::custom(VJewelleryFilterEnum::JSON_METAL->value, new MetalFilter),
                AllowedFilter::custom(VJewelleryFilterEnum::JSON_COVERAGE->value, new CoverageFilter),
                AllowedFilter::custom(VJewelleryFilterEnum::JSON_STONE->value, new StoneFilter),
                AllowedFilter::custom(VJewelleryFilterEnum::JSON_STONE_FAMILY->value, new FamilyFilter),
                AllowedFilter::custom(VJewelleryFilterEnum::JSON_STONE_GROUP->value, new ClassifierGroupFilter),
                'is_active', 'jewellery'
            ]);
    }
}