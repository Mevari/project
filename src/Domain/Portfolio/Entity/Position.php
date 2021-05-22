<?php

namespace App\Domain\Portfolio\Entity;

use App\Domain\Portfolio\ValueObject\Price;
use App\Domain\Portfolio\ValueObject\Quantity;
use App\Domain\Portfolio\ValueObject\Symbol;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

/**
 * @ORM\Entity()
 */
class Position
{

    /**
     * @ORM\Id
     * @ORM\Column(type="uuid",unique=true)
     */
    private Uuid $uuid;

    /**
     * @ORM\Embedded(class="App\Domain\Portfolio\ValueObject\Symbol", columnPrefix=false)
     */
    private Symbol $symbol;

    /**
     * @ORM\Embedded(class="App\Domain\Portfolio\ValueObject\Price", columnPrefix=false)
     */
    private Price $price;

    /**
     * @ORM\Embedded(class="App\Domain\Portfolio\ValueObject\Quantity", columnPrefix=false)
     */
    private Quantity $quantity;

    public function __construct(Uuid $uuid, Symbol $symbol, Price $price, Quantity $quantity)
    {
        $this->uuid = $uuid;
        $this->symbol = $symbol;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}
