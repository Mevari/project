<?php

namespace App\Application\Serializer;

interface SerializerInterface
{
    /**
     * @param mixed $data
     *
     * @return string
     */
    public function serialize(mixed $data): string;
}
