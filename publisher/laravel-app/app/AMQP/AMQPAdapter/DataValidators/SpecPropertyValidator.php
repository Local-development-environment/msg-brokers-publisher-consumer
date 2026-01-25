<?php

declare(strict_types=1);

namespace App\AMQP\AMQPAdapter\DataValidators;

use Illuminate\Support\Facades\Validator;

final readonly class SpecPropertyValidator
{
    public function __construct(private array $specProperties)
    {
    }

    public function specPropertyValidation(): void
    {
        $validator = Validator::make(
            data: [
                'specProperties' => $this->specProperties,
            ],
            rules: [
                'specProperties' => ['required', 'array', 'max:100']
            ]
        );

        dump($validator->validated());
    }
}
