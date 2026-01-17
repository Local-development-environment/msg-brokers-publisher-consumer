<?php

declare(strict_types=1);

namespace App\AMQP\AMQPAdapter\DataValidators;

final class JewelleryValidator
{
    public function __construct(private readonly array $jewellery)
    {
    }

    public function jewelleryValidation(): void
    {
        dump($this->jewellery);
    }
}
