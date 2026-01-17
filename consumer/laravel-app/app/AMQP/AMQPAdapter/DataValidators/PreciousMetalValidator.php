<?php

declare(strict_types=1);

namespace App\AMQP\AMQPAdapter\DataValidators;

final class PreciousMetalValidator
{
    public function __construct(private readonly array $preciousMetal)
    {
    }

    public function preciousMetalValidation(): void
    {
        dump($this->preciousMetal);
    }
}
