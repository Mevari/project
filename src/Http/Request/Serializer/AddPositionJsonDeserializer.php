<?php

namespace App\Http\Request\Serializer;

use App\Application\Serializer\JsonDeserializer;
use App\Http\Request\Serializer\Normalizer\AddPositionNormalizer;

class AddPositionJsonDeserializer extends JsonDeserializer
{
    public function __construct(array $normalizers = [], array $encoders = [])
    {
        $normalizers = array_merge($normalizers, [
            new AddPositionNormalizer(),
        ]);

        parent::__construct($normalizers, $encoders);
    }
}
