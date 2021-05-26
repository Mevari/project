<?php

declare(strict_types=1);

namespace App\Application\Validator;

interface ConstraintInterface
{
    public function getMessage(): string;
}