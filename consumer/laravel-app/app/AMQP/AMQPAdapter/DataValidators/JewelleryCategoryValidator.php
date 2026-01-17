<?php

declare(strict_types=1);

namespace App\AMQP\AMQPAdapter\DataValidators;

final class JewelleryCategoryValidator
{
    public function __construct(private readonly string $category)
    {
    }

    public function jewelleryCategoryValidation(): void
    {
        dump($this->category);
    }
}
