<?php

namespace App\Application\Validator\CustomValidator;

use App\Application\Validator\ConstraintInterface;
use App\Application\Validator\ConstraintValidator;

class StringValidator extends ConstraintValidator
{
    /**
     * @param mixed $value
     * @param ConstraintInterface $constraint
     */
    public function validate($value, $constraint): void
    {
        if ($value === null) {
            return;
        }

        if (!is_string($value)) {
            $this->addViolation($constraint);
        }
    }
}
