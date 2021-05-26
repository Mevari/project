<?php

namespace App\Application\Serializer;

use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;

class JsonDeserializer implements DeserializerInterface
{
    private array $normalizers;

    private array $encoders;

    public function __construct(array $normalizers = [], array $encoders = [])
    {
        $this->normalizers = $normalizers;
        $this->encoders = array_merge($encoders, [
            new JsonEncoder(new JsonEncode()),
        ]);
    }

    /** @inheritDoc */
    public function deserialize(mixed $data, string $type): mixed
    {
        return (new SymfonySerializer($this->normalizers, $this->encoders))->deserialize($data, $type, 'json');
    }
}
