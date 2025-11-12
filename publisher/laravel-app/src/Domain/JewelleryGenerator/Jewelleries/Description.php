<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries;

final class Description
{
    public function getDescription(): string
    {
        return fake()->realText();
    }
}
