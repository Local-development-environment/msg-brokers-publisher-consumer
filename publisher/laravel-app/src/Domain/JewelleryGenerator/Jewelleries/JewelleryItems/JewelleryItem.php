<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\JewelleryItems;

use Domain\Jewelleries\Categories\Enums\CategoryBuilderEnum;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Random\RandomException;

final class JewelleryItem
{
    use ProbabilityArrayElementTrait;

    private string $partNumber;

    /**
     * @throws RandomException
     */
    public function jewelleryItem(array $properties): array
    {
        $this->partNumber = $this->getPartNumber();

        return [
            'name'         => $this->getName($properties),
            'description'  => $this->getDescription(),
            'approxWeight' => $this->getApproxWeight(),
            'partNumber'   => $this->partNumber,
            'isActive'     => $this->getIsActive(),
        ];
    }

    private function getApproxWeight(): float
    {
        return fake()->randomFloat(2, 0, 10);
    }

    private function getDescription(): string
    {
        return fake()->realText();
    }

    private function getIsActive(): bool
    {
        return true;
    }

    private function getName(array $properties): string
    {
        if (empty($properties['metalItem']['coverages'])) {
            $coverage = 'без покрытия';
        } else {
            $stringCoverage = implode(' ', $properties['metalItem']['coverages']);
            $coverage = "покрытие ($stringCoverage)";
        }

        if (empty($properties['insertItem'])) {
            $inserts = 'без вставок';
        } else {
            $stones = [];
            foreach ($properties['insertItem'] as $insert) {
                $stones[] = $insert['stoneName'];
            }

            $stringInserts = implode(' ', array_unique($stones));
            $inserts = "со вставками ($stringInserts)";
        }

        return mb_ucfirst($properties['category']) . ' ' . $properties['metalItem']['metalType'] .
            ' проба ' . $properties['metalItem']['hallmark'] . ' ' . ' ' . $coverage .
             ' ' . $inserts . ' артикул ' . $this->partNumber ;
    }

    /**
     * @throws RandomException
     */
    public function getPartNumber($n = 20): string
    {
        return bin2hex(random_bytes($n / 2));
    }
}