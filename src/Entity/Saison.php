<?php

namespace App\Entity;

use App\Repository\SaisonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SaisonRepository::class)]
class Saison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type:'datetime', nullable: true)]
    private ?\DateTimeInterface $begin_at = null;

    #[ORM\Column(type:'datetime', nullable: true)]
    private ?\DateTimeInterface $finished_at = null;

    #[ORM\Column(type:'datetime')]
    private \DateTimeInterface $modified_at;

    #[ORM\Column(length: 255,type:'string')]
    private string $full_name;

    #[ORM\ManyToOne(targetEntity: League::class)]
    private League $leagueId;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getBeginAt(): ?\DateTimeInterface
    {
        return $this->begin_at;
    }

    public function setBeginAt(\DateTimeInterface $begin_at): static
    {
        $this->begin_at = $begin_at;

        return $this;
    }

    public function getFinishedAt(): ?\DateTimeInterface
    {
        return $this->finished_at;
    }

    public function setFinishedAt(\DateTimeInterface $finished_at): static
    {
        $this->finished_at = $finished_at;

        return $this;
    }

    public function getModifiedAt(): \DateTimeInterface
    {
        return $this->modified_at;
    }

    public function setModifiedAt(\DateTimeInterface $modified_at): static
    {
        $this->modified_at = $modified_at;

        return $this;
    }

    public function getFullName(): string
    {
        return $this->full_name;
    }

    public function setFullName(?string $full_name): static
    {
        $this->full_name = $full_name;

        return $this;
    }

    public function getLeagueId(): League
    {
        return $this->leagueId;
    }

    public function setLeagueId(?League $leagueId): static
    {
        $this->leagueId = $leagueId;

        return $this;
    }
}
