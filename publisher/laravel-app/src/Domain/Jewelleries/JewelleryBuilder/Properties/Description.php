<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\Properties;

final class Description
{
    public function getDescription(): string
    {
        return fake()->realText();
    }
}
