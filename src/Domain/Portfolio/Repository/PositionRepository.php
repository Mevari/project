<?php

namespace App\Domain\Portfolio\Repository;

use App\Domain\Portfolio\Entity\Position;
use Doctrine\ORM\EntityManagerInterface;

class PositionRepository implements PositionRepositoryInterface
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function add(Position $position): void
    {
        $this->em->persist($position);
    }
}
