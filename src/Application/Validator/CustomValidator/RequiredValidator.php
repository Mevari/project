<?php

namespace App\Application\Validator\CustomValidator;

use App\Application\Validator\ConstraintInterface;
use App\Application\Validator\ConstraintValidator;

class RequiredValidator extends ConstraintValidator
{
    /**
     * @param mixed $value
     * @param ConstraintInterface $constraint
     */
    public function validate($value, $constraint): void
    {
        if (!is_int($value) && !$value) {
            $this->addViolation($constraint);
        }
    }
}
