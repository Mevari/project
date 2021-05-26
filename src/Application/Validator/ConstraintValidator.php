<?php

declare(strict_types=1);

namespace App\Application\Validator;

use Symfony\Component\Validator\ConstraintValidator as SymfonyConstraintValidator;

abstract class ConstraintValidator extends SymfonyConstraintValidator
{
    protected function addViolation(ConstraintInterface $constraint, string $path = null): void
    {
        $violation = $this->context
            ->buildViolation($constraint->getMessage());

        if ($path !== null) {
            $violation->atPath($path);
        }

        $violation->addViolation();
    }
}
