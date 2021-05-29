<?php

declare(strict_types=1);

namespace App\Application\Validator;

use App\Application\Validator\Exception\ValidatorException;
use Symfony\Component\Validator\Constraint;

interface ValidatorInterface
{
    /**
     * @param mixed $data
     * @param Constraint|Constraint[]|null $constraints The constraint(s) to validate against
     *
     * @return void
     *
     * @throws ValidatorException
     */
    public function validate(mixed $data, Constraint|array|null $constraints = null): void;
}
