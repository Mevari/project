<?php

namespace App\Http\Controller;

use App\Http\Request\DTO\AddPositionRequestDTO;
use Symfony\Component\Routing\Annotation\Route;

class PositionController
{
    #[Route('/positions', methods: ['POST'])]
    public function add(AddPositionRequestDTO $positionRequestDTO)
    {
        dd($positionRequestDTO);
    }
}
