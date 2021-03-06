<?php

namespace App\Domain\Portfolio\ValueObject;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable
 */
class Price
{
    /**
     * @ORM\Column(type="decimal", precision=8, scale=2, nullable=false)
     */
    private float $price;

    public function __construct(float $price)
    {
        if ($price < 0) {
            throw new \InvalidArgumentException();
        }

        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
