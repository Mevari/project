<?php

namespace App\Application\Serializer;

interface DeserializerInterface
{
    /**
     * Deserializes data into the given type.
     *
     * @param mixed $data
     * @param string $type
     *
     * @return mixed
     */
    public function deserialize(mixed $data, string $type): mixed;
}
