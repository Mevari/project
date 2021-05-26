<?php

namespace App\Http\Request\Constraint\Symbol;

use App\Application\Validator\ConstraintInterface;
use App\Application\Validator\CustomValidator\StringValidator;
use Symfony\Component\Validator\Constraint;

#[\Attribute]
class SymbolType extends Constraint implements ConstraintInterface
{
    private string $message = 'Symbol should be string';

    public function getMessage(): string
    {
        return $this->message;
    }

    public function validatedBy(): string
    {
        return StringValidator::class;
    }
}
