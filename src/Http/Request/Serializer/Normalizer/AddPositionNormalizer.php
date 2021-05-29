<?php

namespace App\Http\Request\Serializer\Normalizer;

use App\Http\Request\DTO\AddPositionRequestDTO;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class AddPositionNormalizer implements DenormalizerAwareInterface, DenormalizerInterface
{
    use DenormalizerAwareTrait;

    /**
     * @param mixed $data
     * @param string $type
     * @param string|null $format
     * @param array $context
     *
     * @return mixed|void
     */
    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        $dto = new AddPositionRequestDTO();

        $dto->symbol = $data['symbol'] ?? null;
        $dto->companyName = $data['companyName'] ?? null;
        $dto->quantity = $data['quantity'] ?? null;
        $dto->price = $data['price'] ?? null;

        return $dto;
    }

    /**
     * @param mixed $data
     * @param string $type
     * @param string|null $format
     *
     * @return bool
     */
    public function supportsDenormalization($data, string $type, string $format = null)
    {
        return $type === AddPositionRequestDTO::class;
    }
}
