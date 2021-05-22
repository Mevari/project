<?php

declare(strict_types=1);

namespace App\Application\Validator\Exception;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class ValidatorException extends HttpException
{
    private ConstraintViolationListInterface $constraintViolationList;

    public function __construct(ConstraintViolationListInterface $constraintViolationList)
    {
        $this->constraintViolationList = $constraintViolationList;

        parent::__construct(Response::HTTP_UNPROCESSABLE_ENTITY, "Validation error");
    }

    public function constraintViolationListInterface(): ConstraintViolationListInterface
    {
        return $this->constraintViolationList;
    }
}