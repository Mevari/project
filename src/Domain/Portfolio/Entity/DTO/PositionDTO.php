<?php

namespace App\Domain\Portfolio\Entity\DTO;

use App\Domain\Portfolio\ValueObject\Price;
use App\Domain\Portfolio\ValueObject\Quantity;
use App\Domain\Portfolio\ValueObject\Symbol;
use Symfony\Component\Uid\Uuid;

class PositionDTO
{
    public Uuid $uuid;

    public Symbol $symbol;

    public Price $price;

    public Quantity $quantity;

    public function __construct(Uuid $uuid, Symbol $symbol, Price $price, Quantity $quantity)
    {
        $this->uuid = $uuid;
        $this->symbol = $symbol;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}
