<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\JewelleryItems;

use Domain\Jewelleries\Categories\Enums\CategoryBuilderEnum;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Random\RandomException;

final class JewelleryItem
{
    use ProbabilityArrayElementTrait;

    /**
     * @throws RandomException
     */
    public function jewelleryItem(string $category): array
    {
        return [
            'name'         => $this->getName($category),
            'description'  => $this->getDescription(),
            'approxWeight' => $this->getApproxWeight(),
            'partNumber'   => $this->getPartNumber(),
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

    private function getName(string $category): string
    {
        return $category;
    }

    /**
     * @throws RandomException
     */
    public function getPartNumber($n = 20): string
    {
        return bin2hex(random_bytes($n / 2));
    }
}