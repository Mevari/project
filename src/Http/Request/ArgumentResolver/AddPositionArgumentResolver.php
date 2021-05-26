<?php

namespace App\Http\Request\ArgumentResolver;

use App\Application\Validator\ValidatorInterface;
use App\Http\Request\DTO\AddPositionRequestDTO;
use App\Http\Request\Serializer\AddPositionJsonDeserializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Throwable;

class AddPositionArgumentResolver implements ArgumentValueResolverInterface
{
    public function __construct(private ValidatorInterface $validator)
    {
    }

    /** @inheritdoc  */
    public function supports(Request $request, ArgumentMetadata $argument)
    {
        return $argument->getType() === AddPositionRequestDTO::class;
    }

    /** @inheritdoc  */
    public function resolve(Request $request, ArgumentMetadata $argument)
    {
        $data = $request->getContent();
        $jsonDeserializer = new AddPositionJsonDeserializer();

        try {
            $dto = $jsonDeserializer->deserialize($data, AddPositionRequestDTO::class);
        } catch (Throwable) {
            $dto = new AddPositionRequestDTO();
        }

        $this->validator->validate($dto);

        yield $dto;
    }
}
