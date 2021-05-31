<?php

namespace App\Domain\Portfolio\Service\DTO;

class AddPositionDTO
{
    public ?string $companyName;

    public string $symbol;

    public float $price;

    public int $quantity;

    public function __construct(?string $companyName, string $symbol, float $price, int $quantity)
    {
        $this->companyName = $companyName;
        $this->symbol = $symbol;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}
