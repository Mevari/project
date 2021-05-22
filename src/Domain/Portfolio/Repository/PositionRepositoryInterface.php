<?php

namespace App\Domain\Portfolio\Repository;

use App\Domain\Portfolio\Entity\Position;

interface PositionRepositoryInterface
{
    public function add(Position $position): void;
}
