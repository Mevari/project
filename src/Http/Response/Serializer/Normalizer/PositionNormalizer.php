<?php

namespace App\Http\Response\Serializer\Normalizer;

use App\Domain\Portfolio\Entity\Position;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;

class PositionNormalizer implements NormalizerInterface, NormalizerAwareInterface
{
    use NormalizerAwareTrait;

    public function supportsNormalization($data, string $format = null)
    {
        return $data instanceof Position;
    }

    /**
     * @param Position $position
     * @param string|null $format
     * @param array $context
     *
     * @return array|\ArrayObject|bool|float|int|string|void|null
     */
    public function normalize($position, string $format = null, array $context = [])
    {
        $dto = $position->toDTO();

        return [
            'uuid' => $dto->uuid->toRfc4122(),
            'symbol' => $dto->symbol->getSymbol(),
            'companyName' => $dto->symbol->getCompanyName(),
            'price' => $dto->price->getPrice(),
            'quantity' => $dto->quantity->getQuantity(),
        ];
    }

}
