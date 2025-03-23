<?php

declare(strict_types=1);

namespace Domain\Integrations\UVIJewelleries\DTO;

use Carbon\CarbonInterface;

final readonly class JewelleryDTO
{
    public function __construct(
        public int $id,
        public int $user_id,
        public int $prcs_metal_sample_id,
        public int $prcs_metal_colour_id,
        public int $prcs_metal_id,
        public int $jewellery_category_id,
        public string $name,
        public string $part_number,
        public string $description,
        public string $slug,
        public bool $is_active,
        public string $approx_weight,
        public CarbonInterface $created_at,
        public CarbonInterface $updated_at,
    )
    {}
}
