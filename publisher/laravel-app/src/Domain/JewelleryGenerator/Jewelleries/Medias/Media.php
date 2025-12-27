<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Medias;

use Random\RandomException;

final class Media
{
    /**
     * @throws RandomException
     */
    public function getMedia(): array
    {
        return [
            'catalog' => [
                'pictures' => $this->getItems(4, 'image', 'catalog'),
                'videos' => $this->getItems(2, 'video', 'catalog'),
            ],
            'reviews' => [
                'pictures' => $this->getItems(rand(0,4), 'image', 'reviews'),
                'videos' => $this->getItems(rand(0,2), 'video', 'reviews'),
            ]
        ];
    }

    /**
     * @throws RandomException
     */
    private function getItems(int $num, string $type, string $assignment): array
    {
        $items = [];

        for ($i = 0; $i < $num; $i++) {
            $items[] = $type . '-' . $assignment . '-' . bin2hex(random_bytes(20 / 2));
        }

        return $items;
    }
}