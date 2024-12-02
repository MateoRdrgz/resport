<?php

namespace App\Entity;

use App\Repository\OpponentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('opponents')]
#[ORM\Entity(repositoryClass: OpponentRepository::class)]
class Opponent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Matchs::class)]
    private Matchs $matchId;

    #[ORM\OneToOne(cascade: ['persist', 'remove'], targetEntity: Team::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Team $opponentIdTeam = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'], targetEntity: Player::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Player $opponentIdPlayer = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getMatchId(): Matchs
    {
        return $this->matchId;
    }

    public function setMatchId(Matchs $matchId): static
    {
        $this->matchId = $matchId;

        return $this;
    }

    public function getOpponentIdTeam(): ?Team
    {
        return $this->opponentIdTeam;
    }

    public function setOpponentIdTeam(?Team $opponentIdTeam): static
    {
        $this->opponentIdTeam = $opponentIdTeam;

        return $this;
    }

    public function getOpponentIdPlayer(): ?Player
    {
        return $this->opponentIdPlayer;
    }

    public function setOpponentIdPlayer(?Player $opponentIdPlayer): static
    {
        $this->opponentIdPlayer = $opponentIdPlayer;

        return $this;
    }
}
