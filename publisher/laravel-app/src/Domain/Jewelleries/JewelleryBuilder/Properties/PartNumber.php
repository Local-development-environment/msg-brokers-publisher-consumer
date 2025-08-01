<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\Properties;

use Random\RandomException;

final class PartNumber
{
    /**
     * @throws RandomException
     */
    public function getPartNumber($n = 20): string
    {
        return bin2hex(random_bytes($n / 2));
    }
}
