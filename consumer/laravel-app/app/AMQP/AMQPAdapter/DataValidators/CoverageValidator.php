<?php

declare(strict_types=1);

namespace App\AMQP\AMQPAdapter\DataValidators;

final class CoverageValidator
{
    public function __construct(private readonly array $coverage)
    {
    }

    public function coverageValidation(): void
    {
        dump($this->coverage);
    }
}
