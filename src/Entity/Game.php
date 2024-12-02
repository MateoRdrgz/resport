<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('games')]
#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'boolean')]
    private bool $is_esport;

    #[ORM\Column(length: 255,type:'string')]
    private string $name;

    #[ORM\Column(length: 255,type:'string', nullable: true)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true, type: 'string')]
    private ?string $apiEntrypoint = null;

    public function __construct(bool $is_esport, string $name, string $slug)
    {
        $this->is_esport = $is_esport;
        $this->name = $name;
        $this->slug = $slug;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function isEsport(): ?bool
    {
        return $this->is_esport;
    }

    public function setEsport(bool $is_esport): static
    {
        $this->is_esport = $is_esport;

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

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getApiEntrypoint(): ?string
    {
        return $this->apiEntrypoint;
    }

    public function setApiEntrypoint(?string $apiEntrypoint): static
    {
        $this->apiEntrypoint = $apiEntrypoint;

        return $this;
    }
}
