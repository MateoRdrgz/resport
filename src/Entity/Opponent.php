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
    private Matchs $match;

    #[ORM\OneToOne(cascade: ['persist', 'remove'], targetEntity: Team::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Team $opponentTeam = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'], targetEntity: Player::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Player $opponentPlayer = null;

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
        return $this->match;
    }

    public function setMatchId(Matchs $match): static
    {
        $this->match = $match;

        return $this;
    }

    public function getOpponentIdTeam(): ?Team
    {
        return $this->opponentTeam;
    }

    public function setOpponentIdTeam(?Team $opponentTeam): static
    {
        $this->opponentTeam = $opponentTeam;

        return $this;
    }

    public function getOpponentIdPlayer(): ?Player
    {
        return $this->opponentPlayer;
    }

    public function setOpponentIdPlayer(?Player $opponentPlayer): static
    {
        $this->opponentPlayer = $opponentPlayer;

        return $this;
    }
}
