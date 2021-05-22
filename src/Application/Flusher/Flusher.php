<?php

namespace App\Application\Flusher;

use Doctrine\ORM\EntityManagerInterface;

class Flusher implements FlusherInterface
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function flush(): void
    {
        $this->em->flush();
    }
}
