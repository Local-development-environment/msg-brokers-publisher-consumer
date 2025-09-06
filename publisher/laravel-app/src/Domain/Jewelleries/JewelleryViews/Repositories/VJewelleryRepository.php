<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\Repositories;

use Domain\Jewelleries\JewelleryViews\Enums\VJewelleryFilterEnum;
use Domain\Jewelleries\JewelleryViews\MenuFilters\ApproxWeightRangeMenuFilter;
use Domain\Jewelleries\JewelleryViews\MenuFilters\CategoryMenuFilter;
use Domain\Jewelleries\JewelleryViews\MenuFilters\CoverageMenuFilter;
use Domain\Jewelleries\JewelleryViews\MenuFilters\InsertFamilyMenuFilter;
use Domain\Jewelleries\JewelleryViews\MenuFilters\InsertStoneGroupMenuFilter;
use Domain\Jewelleries\JewelleryViews\MenuFilters\InsertStoneMenuFilter;
use Domain\Jewelleries\JewelleryViews\MenuFilters\MetalMenuFilter;
use Domain\Jewelleries\JewelleryViews\MenuFilters\PriceRangeMenuFilter;
use Domain\Jewelleries\JewelleryViews\Models\VJewellery;
use Domain\Shared\CustomFilters\ApproxWeightFilter;
use Domain\Shared\CustomFilters\ClassifierGroupFilter;
use Domain\Shared\CustomFilters\CoverageFilter;
use Domain\Shared\CustomFilters\FamilyFilter;
use Domain\Shared\CustomFilters\MetalFilter;
use Domain\Shared\CustomFilters\PriceFilter;
use Domain\Shared\CustomFilters\StoneFilter;
use Domain\Shared\Repositories\AbstractMenuFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
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

        return collect([
            'data' => $data,
            'menu' => $this->getMenu($params)
        ]);
    }

    public function show(array $params, int $id): VJewellery
    {
        return QueryBuilder::for(VJewellery::class)
            ->where('id', $id)
            ->firstOrFail();
    }

    private function getVJewelleryBuilder(Request $request): QueryBuilder
    {
        return QueryBuilder::for(VJewellery::query(), $request)
            ->allowedFilters([
                AllowedFilter::exact(VJewelleryFilterEnum::PK_ITSELF->value),
                AllowedFilter::exact(VJewelleryFilterEnum::PART_NUMBER->value),
                AllowedFilter::exact(VJewelleryFilterEnum::FK_CATEGORY->value),
                AllowedFilter::custom(VJewelleryFilterEnum::APPROX_WEIGHT->value, new ApproxWeightFilter()),
                AllowedFilter::custom(VJewelleryFilterEnum::PRICE_RANGE->value, new PriceFilter),
                AllowedFilter::custom(VJewelleryFilterEnum::JSON_METAL->value, new MetalFilter),
                AllowedFilter::custom(VJewelleryFilterEnum::JSON_COVERAGE->value, new CoverageFilter),
                AllowedFilter::custom(VJewelleryFilterEnum::JSON_STONE->value, new StoneFilter),
                AllowedFilter::custom(VJewelleryFilterEnum::JSON_STONE_FAMILY->value, new FamilyFilter),
                AllowedFilter::custom(VJewelleryFilterEnum::JSON_STONE_GROUP->value, new ClassifierGroupFilter),
                'is_active', 'jewellery'
            ]);
    }

    private function getMenuItems(string $className, array $params, string $nameParam): array
    {
        $items = new $className();

        return $items($this->getVJewelleryBuilder($this->getRequestWithoutFilterItem($params, $nameParam)));
    }

    private function getMenu(array $params): array
    {
        return [
            'categories' => $this->getMenuItems(
                CategoryMenuFilter::class, $params, VJewelleryFilterEnum::FK_CATEGORY->value
            ),
            'price_range' => $this->getMenuItems(
                PriceRangeMenuFilter::class, $params, VJewelleryFilterEnum::PRICE_RANGE->value
            ),
            'approx_weight_range' => $this->getMenuItems(
                ApproxWeightRangeMenuFilter::class, $params, VJewelleryFilterEnum::APPROX_WEIGHT->value
            ),
            'metals' => $this->getMenuItems(
                MetalMenuFilter::class, $params, VJewelleryFilterEnum::JSON_METAL->value
            ),
            'coverages' => $this->getMenuItems(
                CoverageMenuFilter::class, $params, VJewelleryFilterEnum::JSON_COVERAGE->value
            ),
            'inserts' => [
                'stones' => $this->getMenuItems(
                    InsertStoneMenuFilter::class, $params, VJewelleryFilterEnum::JSON_STONE->value
                ),
                'families' => $this->getMenuItems(
                    InsertFamilyMenuFilter::class, $params, VJewelleryFilterEnum::JSON_STONE_FAMILY->value
                ),
                'groups' => $this->getMenuItems(
                    InsertStoneGroupMenuFilter::class, $params, VJewelleryFilterEnum::JSON_STONE_GROUP->value
                )
            ]
        ];
    }
}