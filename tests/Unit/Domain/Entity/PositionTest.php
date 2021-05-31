<?php

namespace App\Tests\Unit\Domain\Entity;

use App\Domain\Portfolio\Entity\Position;
use App\Domain\Portfolio\ValueObject\Price;
use App\Domain\Portfolio\ValueObject\Quantity;
use App\Domain\Portfolio\ValueObject\Symbol;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Uuid;

class PositionTest extends TestCase
{
    public function testToDTO(): void
    {
        $uuid = Uuid::v6();
        $symbol = new Symbol('test', 'Company');
        $price = new Price(1.3);
        $quantity = new Quantity(1);

        $position = new Position($uuid, $symbol, $price, $quantity);

        $dto = $position->toDTO();

        $this->assertSame($uuid, $dto->uuid);
        $this->assertSame($symbol, $dto->symbol);
        $this->assertSame($price, $dto->price);
        $this->assertSame($quantity, $dto->quantity);
    }
}
