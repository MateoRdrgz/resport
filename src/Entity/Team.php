<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(length: 255,type:'string')]
    private string $name;

    #[ORM\Column(length: 255, nullable: true, type: 'string')]
    private ?string $acronym = null;

    #[ORM\Column(length: 512, nullable: true, type: 'string')]
    private ?string $imageUrl = null;

    #[ORM\Column(type:'datetime')]
    private \DateTime $modifiedAt;

    #[ORM\ManyToOne(targetEntity: Country::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Country $location = null;

    #[ORM\ManyToOne(targetEntity: Game::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Game $game = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAcronym(): ?string
    {
        return $this->acronym;
    }

    public function setAcronym(?string $acronym): static
    {
        $this->acronym = $acronym;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): static
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getModifiedAt(): ?\DateTime
    {
        return $this->modifiedAt;
    }

    public function setModifiedAt(?\DateTime $modifiedAt): static
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    public function getLocation(): ?Country
    {
        return $this->location;
    }

    public function setLocationId(?Country $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGameId(?Game $game): static
    {
        $this->game = $game;

        return $this;
    }
}
