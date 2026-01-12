<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\Repositories;

use Domain\Jewelleries\JewelleryViews\Enums\VJewelleryFilterParamNameEnum;
use Domain\Jewelleries\JewelleryViews\MenuFilters\ApproxWeightRangeMenuFilter;
use Domain\Jewelleries\JewelleryViews\MenuFilters\CategoryMenuFilter;
use Domain\Jewelleries\JewelleryViews\MenuFilters\CoverageMenuFilter;
use Domain\Jewelleries\JewelleryViews\MenuFilters\InsertFamilyMenuFilter;
use Domain\Jewelleries\JewelleryViews\MenuFilters\InsertStoneColourMenuFilter;
use Domain\Jewelleries\JewelleryViews\MenuFilters\InsertStoneGroupMenuFilter;
use Domain\Jewelleries\JewelleryViews\MenuFilters\InsertStoneMenuFilter;
use Domain\Jewelleries\JewelleryViews\MenuFilters\MetalMenuFilter;
use Domain\Jewelleries\JewelleryViews\MenuFilters\IsInsertMenuFilter;
use Domain\Jewelleries\JewelleryViews\MenuFilters\PriceRangeMenuFilter;
use Domain\Jewelleries\JewelleryViews\Models\VJewellery;
use Domain\Shared\CustomFilters\ApproxWeightFilter;
use Domain\Shared\CustomFilters\ClassifierGroupFilter;
use Domain\Shared\CustomFilters\CoverageFilter;
use Domain\Shared\CustomFilters\FamilyFilter;
use Domain\Shared\CustomFilters\IsInsertFilter;
use Domain\Shared\CustomFilters\MetalColourFilter;
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
                AllowedFilter::exact(VJewelleryFilterParamNameEnum::OWN_ID->value),
                AllowedFilter::exact(VJewelleryFilterParamNameEnum::PART_NUMBER->value),
                AllowedFilter::exact(VJewelleryFilterParamNameEnum::JEWELLERY_CATEGORY_ID->value),
                AllowedFilter::exact(VJewelleryFilterParamNameEnum::DOMINANT_COLOUR_ID->value),
                AllowedFilter::custom(VJewelleryFilterParamNameEnum::IS_INSERTS->value, new IsInsertFilter)->nullable(),
                AllowedFilter::custom(VJewelleryFilterParamNameEnum::APPROX_WEIGHT->value, new ApproxWeightFilter),
                AllowedFilter::custom(VJewelleryFilterParamNameEnum::PRICE_RANGE->value, new PriceFilter),
                AllowedFilter::custom(VJewelleryFilterParamNameEnum::METAL_ID->value, new MetalFilter),
                AllowedFilter::custom(VJewelleryFilterParamNameEnum::COVERAGE_ID->value, new CoverageFilter),
                AllowedFilter::custom(VJewelleryFilterParamNameEnum::STONE_ID->value, new StoneFilter),
                AllowedFilter::custom(VJewelleryFilterParamNameEnum::STONE_FAMILY_ID->value, new FamilyFilter),
                AllowedFilter::custom(VJewelleryFilterParamNameEnum::STONE_GROUP_ID->value, new ClassifierGroupFilter),
                AllowedFilter::custom(VJewelleryFilterParamNameEnum::METAL_COLOUR_ID->value, new MetalColourFilter),
                'is_active', 'jewellery'
            ]);
    }

    private function getMenuItems(string $className, array $params, string $nameParam): array|int
    {
        $items = new $className();
//        dump($nameParam);
//        dd($this->getVJewelleryBuilder($this->getRequestWithoutFilterItem($params, $nameParam)));
        return $items($this->getVJewelleryBuilder($this->getRequestWithoutFilterItem($params, $nameParam)));
    }

    private function getMenu(array $params): array
    {
//        dd($params['filter'][VJewelleryFilterParamNameEnum::FK_JEWELLERY_CATEGORY->value]);
        return [
            'categories' => $this->getMenuItems(
                CategoryMenuFilter::class, $params, VJewelleryFilterParamNameEnum::JEWELLERY_CATEGORY_ID->value
            ),
            'price_range' => $this->getMenuItems(
                PriceRangeMenuFilter::class, $params, VJewelleryFilterParamNameEnum::PRICE_RANGE->value
            ),
            'approx_weight_range' => $this->getMenuItems(
                ApproxWeightRangeMenuFilter::class, $params, VJewelleryFilterParamNameEnum::APPROX_WEIGHT->value
            ),
            'metals' => $this->getMenuItems(
                MetalMenuFilter::class, $params, VJewelleryFilterParamNameEnum::METAL_ID->value
            ),
            'coverages' => $this->getMenuItems(
                CoverageMenuFilter::class, $params, VJewelleryFilterParamNameEnum::COVERAGE_ID->value
            ),
            'inserts' => [
                'stones' => $this->getMenuItems(
                    InsertStoneMenuFilter::class, $params, VJewelleryFilterParamNameEnum::STONE_ID->value
                ),
                'families' => $this->getMenuItems(
                    InsertFamilyMenuFilter::class, $params, VJewelleryFilterParamNameEnum::STONE_FAMILY_ID->value
                ),
                'groups' => $this->getMenuItems(
                    InsertStoneGroupMenuFilter::class, $params, VJewelleryFilterParamNameEnum::STONE_GROUP_ID->value
                ),
                'colours' => $this->getMenuItems(
                    InsertStoneColourMenuFilter::class, $params, VJewelleryFilterParamNameEnum::DOMINANT_COLOUR_ID->value
                ),
                'is_inserts' => $this->getMenuItems(
                    IsInsertMenuFilter::class, $params, VJewelleryFilterParamNameEnum::IS_INSERTS->value
                ),
            ]
        ];
    }
}
