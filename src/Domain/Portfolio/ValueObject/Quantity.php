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
        if ($quantity <= 0) {
            throw new \InvalidArgumentException();
        }

        $this->quantity = $quantity;
    }

    public function toInt(): int
    {
        return $this->quantity;
    }
}
