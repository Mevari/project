<?php

namespace App\Controller;

use App\Application\Flusher\FlusherInterface;
use App\Domain\Portfolio\Entity\Position;
use App\Domain\Portfolio\Repository\PositionRepositoryInterface;
use App\Domain\Portfolio\ValueObject\Price;
use App\Domain\Portfolio\ValueObject\Quantity;
use App\Domain\Portfolio\ValueObject\Symbol;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

class TestController {


    #[Route('/test')]
    public function number(PositionRepositoryInterface $positionRepository,FlusherInterface $flusher)
    {
        $position = new Position(
            Uuid::v4(),
            new Symbol('apl'),
            new Price(130.2),
            new Quantity(1)
        );

        dd($position);

        $positionRepository->add($position);
        $flusher->flush();

        return new Response(
            'Welcome to project '
        );
    }

}
