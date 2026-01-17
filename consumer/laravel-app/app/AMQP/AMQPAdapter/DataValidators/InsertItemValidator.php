<?php

declare(strict_types=1);

namespace App\AMQP\AMQPAdapter\DataValidators;

final class InsertItemValidator
{
    public function __construct(private readonly array $insertItem)
    {
    }

    public function insertItemValidation(): void
    {
        dump($this->insertItem);
    }
}
