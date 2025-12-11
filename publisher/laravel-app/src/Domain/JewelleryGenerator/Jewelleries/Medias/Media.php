<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Medias;

use Domain\Medias\Shared\Producers\Enums\ProducerBuilderEnum;

final class Media
{
    public function getMedia(): array
    {
//        $medias = [];

        return [
            ProducerBuilderEnum::MANAGER->value => [
                'фото' => $this->getItems(4, 'image', 'manager'),
                'видео' => $this->getItems(1, 'video', 'manager'),
            ],
            ProducerBuilderEnum::CUSTOMER->value => [
                'фото' => $this->getItems(rand(0,4), 'image', 'customer'),
                'видео' => $this->getItems(rand(0,2), 'video', 'customer'),
            ],
        ];
    }

    private function getItems(int $num, string $category, string $producer): array
    {
        $items = [];

        for ($i = 0; $i < $num; $i++) {
            $items[] = $category . '-' . $producer . '-' . rand(100000, 999000);
        }

        return $items;
    }
}