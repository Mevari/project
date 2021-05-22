<?php

namespace App\Domain\Portfolio\ValueObject;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable
 */
class Quantity
{
    /**
     * @ORM\Column(type="integer", nullable=false, options={"default" : 0})
     */
    private int $quantity;

    public function __construct(int $quantity)
    {
        $this->quantity = $quantity;
    }
}
