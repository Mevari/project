<?php

namespace App\Domain\Portfolio\Service;

use App\Domain\Portfolio\Entity\Position;
use App\Domain\Portfolio\Repository\PositionRepositoryInterface;
use App\Domain\Portfolio\Service\DTO\AddPositionDTO;
use App\Domain\Portfolio\ValueObject\Price;
use App\Domain\Portfolio\ValueObject\Quantity;
use App\Domain\Portfolio\ValueObject\Symbol;
use Symfony\Component\Uid\Uuid;

class AddPositionService
{
    public function __construct(private PositionRepositoryInterface $positionRepository)
    {
    }

    public function add(AddPositionDTO $addDto): Position
    {
        $position = new Position(
            Uuid::v6(),
            new Symbol($addDto->symbol, $addDto->companyName),
            new Price($addDto->price),
            new Quantity($addDto->quantity)
        );

        $this->positionRepository->add($position);

        return $position;
    }
}
