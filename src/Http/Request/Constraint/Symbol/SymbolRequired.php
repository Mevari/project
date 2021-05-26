<?php

namespace App\Http\Request\Constraint\Symbol;

use App\Application\Validator\ConstraintInterface;
use App\Application\Validator\CustomValidator\RequiredValidator;
use Symfony\Component\Validator\Constraint;

#[\Attribute]
class SymbolRequired extends Constraint implements ConstraintInterface
{
    private string $message = 'Symbol should be filled.';

    public function getMessage(): string
    {
        return $this->message;
    }
    public function validatedBy(): string
    {
        return RequiredValidator::class;
    }
}
