<?php

declare(strict_types=1);

namespace App\Application\Validator;

use App\Application\Validator\Exception\ValidatorException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Validator implements \App\Application\Validator\ValidatorInterface
{
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /** @inheritdoc */
    public function validate(mixed $data, array|Constraint|null $constraints = null): void
    {
        $errors = $this->validator->validate($data, $constraints);

        if ($errors->count() === 0) {
            return;
        }

        throw new ValidatorException($errors);
    }

}
