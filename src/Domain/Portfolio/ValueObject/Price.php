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
        $this->price = $price;
    }
}
