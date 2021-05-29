<?php

namespace App\Http\Response\Serializer;

use App\Application\Serializer\JsonSerializer;
use App\Http\Response\Serializer\Normalizer\PositionNormalizer;

class PositionJsonSerializer extends JsonSerializer
{
    public function __construct(array $normalizers = [], array $encoders = [])
    {
        $normalizers = array_merge(
            $normalizers,
            [new PositionNormalizer()]
        );
        parent::__construct($normalizers, $encoders);
    }

}
