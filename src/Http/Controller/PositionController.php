<?php

namespace App\Http\Controller;

use App\Application\Flusher\FlusherInterface;
use App\Domain\Portfolio\Service\AddPositionService;
use App\Domain\Portfolio\Service\DTO\AddPositionDTO;
use App\Http\Request\DTO\AddPositionRequestDTO;
use App\Http\Response\PositionResponse;
use Symfony\Component\Routing\Annotation\Route;

class PositionController
{
    public function __construct(private FlusherInterface $flusher)
    {
    }

    #[Route('/positions', methods: ['POST'])]
    public function add(
        AddPositionRequestDTO $positionRequestDTO,
        AddPositionService $addPositionService
    ): PositionResponse {

        $position = $addPositionService->add(
            new AddPositionDTO(
                $positionRequestDTO->companyName,
                $positionRequestDTO->symbol,
                $positionRequestDTO->price,
                $positionRequestDTO->quantity
            )
        );

        $this->flusher->flush();

        return new PositionResponse($position);
    }
}
