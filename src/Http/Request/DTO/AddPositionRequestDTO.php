<?php

namespace App\Http\Request\DTO;

use App\Http\Request\Constraint as Assert;

class AddPositionRequestDTO
{
    public mixed $companyName;

    #[Assert\Symbol\SymbolRequired]
    #[Assert\Symbol\SymbolType]
    public mixed $symbol;

    #[Assert\Price\PriceRequired]
    public mixed $price;

    #[Assert\Quantity\QuantityRequired]
    public mixed $quantity;
}
