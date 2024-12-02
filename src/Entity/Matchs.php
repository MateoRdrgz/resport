<?php

namespace App\Entity;

use App\Repository\MatchsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('matches')]
#[ORM\Entity(repositoryClass: MatchsRepository::class)]
class Matchs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $BeginAt = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $endAt = null;

    #[ORM\ManyToOne(targetEntity: League::class)]
    private League $league;

    #[ORM\ManyToOne(targetEntity: Team::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Team $winnerTeam = null;

    #[ORM\ManyToOne(targetEntity: Player::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Player $winnerPlayer = null;

    #[ORM\ManyToOne(targetEntity: Saison::class)]
    private Saison $season;

    #[ORM\ManyToOne(targetEntity: Game::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Game $game = null;

    #[ORM\Column(length: 255,type:'string')]
    private string $status;

    #[ORM\Column(length: 255,type:'string')]
    private string $name;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $modifiedAt;

    public function __construct(\DateTime $BeginAt, \DateTime $endAt, League $leagueId, Saison $seasonId, string $status, string $name, \DateTime $modifiedAt)
    {
        $this->BeginAt = $BeginAt;
        $this->endAt = $endAt;
        $this->league = $leagueId;
        $this->season = $seasonId;
        $this->status = $status;
        $this->name = $name;
        $this->modifiedAt = $modifiedAt;
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

    public function getBeginAt(): ?\DateTimeInterface
    {
        return $this->BeginAt;
    }

    public function setBeginAt(\DateTimeInterface $BeginAt): static
    {
        $this->BeginAt = $BeginAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->endAt;
    }

    public function setEndAt(\DateTimeInterface $endAt): static
    {
        $this->endAt = $endAt;

        return $this;
    }



    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

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

    public function getModifiedAt(): \DateTimeInterface
    {
        return $this->modifiedAt;
    }

    public function setModifiedAt(\DateTimeInterface $modifiedAt): static
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    public function getLeague(): League
    {
        return $this->league;
    }

    public function setLeague(League $league): static
    {
        $this->league = $league;

        return $this;
    }

    public function getWinnerTeam(): ?Team
    {
        return $this->winnerTeam;
    }

    public function setWinnerTeam(?Team $winnerTeam): static
    {
        $this->winnerTeam = $winnerTeam;

        return $this;
    }

    public function getWinnerPlayer(): ?Player
    {
        return $this->winnerPlayer;
    }

    public function setWinnerPlayer(?Player $winnerPlayer): static
    {
        $this->winnerPlayer = $winnerPlayer;

        return $this;
    }

    public function getSeason(): Saison
    {
        return $this->season;
    }

    public function setSeason(Saison $season): static
    {
        $this->season = $season;

        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): static
    {
        $this->game = $game;

        return $this;
    }
}