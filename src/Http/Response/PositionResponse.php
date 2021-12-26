<?php

namespace App\Http\Response;

use App\Domain\Portfolio\Entity\Position;
use App\Http\Response\Serializer\PositionJsonSerializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PositionResponse extends JsonResponse
{
    public function __construct(Position $position)
    {
        $data = (new PositionJsonSerializer())->serialize($position);
        parent::__construct($data, Response::HTTP_CREATED, [], true);
    }
}
