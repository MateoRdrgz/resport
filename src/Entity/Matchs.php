<?php

namespace App\Entity;

use App\Repository\MatchsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatchsRepository::class)]
class Matchs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $BeginAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $endAt = null;

    #[ORM\ManyToOne]
    private ?League $leagueId = null;

    #[ORM\Column(nullable: true)]
    private ?int $winnerIdTeam = null;

    #[ORM\Column]
    private ?int $winnerIdPlayer = null;

    #[ORM\ManyToOne]
    private ?Saison $seasonId = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    private ?Game $gameId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $modifiedAt = null;

    public function getId(): ?int
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
        return $this->BeginAt;
    }

    public function setBeginAt(?\DateTimeInterface $BeginAt): static
    {
        $this->BeginAt = $BeginAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->endAt;
    }

    public function setEndAt(?\DateTimeInterface $endAt): static
    {
        $this->endAt = $endAt;

        return $this;
    }

    public function getLeagueId(): ?League
    {
        return $this->leagueId;
    }

    public function setLeagueId(?League $leagueId): static
    {
        $this->leagueId = $leagueId;

        return $this;
    }

    public function getWinnerIdTeam(): ?int
    {
        return $this->winnerIdTeam;
    }

    public function setWinnerIdTeam(?int $winnerIdTeam): static
    {
        $this->winnerIdTeam = $winnerIdTeam;

        return $this;
    }

    public function getWinnerIdPlayer(): ?int
    {
        return $this->winnerIdPlayer;
    }

    public function setWinnerIdPlayer(int $winnerIdPlayer): static
    {
        $this->winnerIdPlayer = $winnerIdPlayer;

        return $this;
    }

    public function getSeasonId(): ?Saison
    {
        return $this->seasonId;
    }

    public function setSeasonId(?Saison $seasonId): static
    {
        $this->seasonId = $seasonId;

        return $this;
    }

    public function getGameId(): ?Game
    {
        return $this->gameId;
    }

    public function setGameId(?Game $gameId): static
    {
        $this->gameId = $gameId;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getModifiedAt(): ?\DateTimeInterface
    {
        return $this->modifiedAt;
    }

    public function setModifiedAt(?\DateTimeInterface $modifiedAt): static
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }
}
