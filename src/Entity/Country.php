<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('countries')]
#[ORM\Entity(repositoryClass: CountryRepository::class)]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string',length: 3)]
    private string $code;

    #[ORM\Column(type:'string', length: 255)]
    private string $name;

    #[ORM\Column(length: 512,type: 'string')]
    private string $flagUrl;

    public function __construct(string $Code, string $name, string $flagUrl)
    {
        $this->Code = $Code;
        $this->name = $name;
        $this->flagUrl = $flagUrl;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getFlagUrl(): string
    {
        return $this->flagUrl;
    }

    public function setFlagUrl(string $flagUrl): static
    {
        $this->flagUrl = $flagUrl;

        return $this;
    }
}
