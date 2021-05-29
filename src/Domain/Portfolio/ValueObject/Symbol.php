<?php

namespace App\Domain\Portfolio\ValueObject;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable
 */
class Symbol
{
    /**
     * @ORM\Column(type="string", nullable=false, length=50)
     */
    private string $symbol;

    /**
     * @ORM\Column(type="string", nullable=true, length=255)
     */
    private ?string $companyName;

    public function __construct(string $symbol, ?string $companyName = null)
    {
        $this->symbol = $symbol;
        $this->companyName = $companyName;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }
}
