<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Traits;

use JewelleryDomain\Jewelleries\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;
use JewelleryDomain\Jewelleries\Inserts\TypeOrigins\Enums\TypeOriginBuilderEnum;

trait StoneExteriorSQL
{
    protected function natureExteriorSQL(): string
    {
        $natureType = TypeOriginBuilderEnum::NATURE->value;

        return $this->allExteriorSQL() . " where t.name = '{$natureType}'";
    }

    protected function naturePreciousExteriorSQL(): string
    {
        $natureType = TypeOriginBuilderEnum::NATURE->value;
        $preciousGroup = StoneGroupBuilderEnum::PRECIOUS->value;

        return $this->allExteriorSQL() . " where t.name = '{$natureType}' and group_name = '{$preciousGroup}'";
    }

    /**
     * @param array{stone: string, colour: string|null, facet: string|null} $exterior
     * @return string
     */
    protected function stoneFilterByExteriorSQL(array $exterior): string
    {
        if (!$exterior['colour'] && $exterior['facet']) {

            return $this->allExteriorSQL() . " where s.name = '{$exterior['stone']}'
            and f.name = '{$exterior['facet']}'";

        } elseif (!$exterior['facet'] && $exterior['colour']) {

            return $this->allExteriorSQL() . " where s.name = '{$exterior['stone']}'
            and c.name = '{$exterior['colour']}'";

        } elseif (!$exterior['facet'] && !$exterior['colour']) {

            return $this->allExteriorSQL() . " where s.name = '{$exterior['stone']}'";

        } else {

            return $this->allExteriorSQL() . " where s.name = '{$exterior['stone']}'
            and c.name = '{$exterior['colour']}' and f.name = '{$exterior['facet']}'";

        }

    }

    /**
     * @param array{string} $stones
     * @return string
     */
    protected function stoneFilterByNameSQL(array $stones): string
    {
        $num = count($stones);

        $names = $this->naturePreciousExteriorSQL() . " and  s.name not in (";

        foreach ($stones as $key => $stone) {
            if ($key < $num - 1) {
                $names .= "'$stone',";
            } else {
                $names .= "'$stone'";
            }
        }

        return $names . ");";
    }

    protected function natureJewelleryExteriorSQL(): string
    {
        $natureType = TypeOriginBuilderEnum::NATURE->value;
        $jewelleryGroup = StoneGroupBuilderEnum::JEWELLERIES->value;

        return $this->allExteriorSQL() . " where t.name = '{$natureType}' and group_name = '{$jewelleryGroup}'";
    }

    private function allExteriorSQL(): false|string
    {
        return file_get_contents(base_path('src/Domain/JewelleryGenerator/Jewelleries/InsertItems/exterior.sql'));
    }
}
