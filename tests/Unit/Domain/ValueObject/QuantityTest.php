<?php

namespace App\Tests\Unit\Domain\ValueObject;

use App\Domain\Portfolio\ValueObject\Quantity;
use PHPUnit\Framework\TestCase;

class QuantityTest extends TestCase
{
    /** @dataProvider dataProviderForInvalidQuantity  */
    public function testInvalidQuantity(int $quantity): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Quantity($quantity);
    }

    public function dataProviderForInvalidQuantity(): array
    {
        return [
            ['quantity' => 0],
            ['quantity' => -1],
            ['quantity' => -5]
        ];
    }

    public function testToInt(): void
    {
        $quantity = 5;
        $quantityObject = new Quantity(5);

        $this->assertSame($quantity, $quantityObject->toInt());
    }
}
