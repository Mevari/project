<?php

namespace App\Tests\Unit\Domain\Service;

use App\Domain\Portfolio\Repository\PositionRepositoryInterface;
use App\Domain\Portfolio\Service\AddPositionService;
use App\Domain\Portfolio\Service\DTO\AddPositionDTO;
use PHPUnit\Framework\TestCase;

class AddPositionServiceTest extends TestCase
{
    private \PHPUnit\Framework\MockObject\MockObject|PositionRepositoryInterface $positionRepository;
    private AddPositionService $addPositionService;

    protected function setUp(): void
    {
        $this->positionRepository = $this->createMock(PositionRepositoryInterface::class);
        $this->addPositionService = new AddPositionService($this->positionRepository);

        parent::setUp();
    }

    public function testCreate(): void
    {
        $this->positionRepository->expects($this->once())
            ->method('add');


        $symbol = 'test';
        $companyName = 'company';
        $price = 1.3;
        $quantity = 1;

        $addPositionDTO = new AddPositionDTO(
            $companyName,
            $symbol,
            $price,
            $quantity
        );

        $position = $this->addPositionService->add($addPositionDTO);
        $dto = $position->toDTO();

        $this->assertSame($symbol, $dto->symbol->getSymbol());
        $this->assertSame($companyName, $dto->symbol->getCompanyName());
        $this->assertSame($price, $dto->price->getPrice());
        $this->assertSame($quantity, $dto->quantity->toInt());
    }
}
