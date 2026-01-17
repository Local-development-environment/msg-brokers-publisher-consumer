<?php

declare(strict_types=1);

namespace App\AMQP\AMQPAdapter\DataValidators;

final class SpecPropertyValidator
{
    public function __construct(private readonly array $specProperty)
    {
    }

    public function specPropertyValidation(): void
    {
        dump($this->specProperty);
    }
}
