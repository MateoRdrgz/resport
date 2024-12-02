<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'users')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(length: 255,type: 'string')]
    private string $username;

    #[ORM\Column(length: 255,type: 'string')]
    private string $role;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $created_at;

    #[ORM\Column(length: 255,type: 'string')]
    private string $password;

    /**
     * @var Collection<int, Player>
     */
    #[ORM\ManyToMany(targetEntity: Player::class)]
    private Collection $favorite_players;

    /**
     * @var Collection<int, Game>
     */
    #[ORM\ManyToMany(targetEntity: Game::class)]
    private Collection $favorite_games;

    /**
     * @var Collection<int, Team>
     */
    #[ORM\ManyToMany(targetEntity: Team::class)]
    private Collection $favorite_teams;

    public function __construct()
    {
        $this->favorite_players = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection<int, Player>
     */
    public function getFavoritePlayers(): Collection
    {
        return $this->favorite_players;
    }

    public function addFavoritePlayer(Player $favoritePlayer): static
    {
        if (!$this->favorite_players->contains($favoritePlayer)) {
            $this->favorite_players->add($favoritePlayer);
        }

        return $this;
    }

    public function removeFavoritePlayer(Player $favoritePlayer): static
    {
        $this->favorite_players->removeElement($favoritePlayer);

        return $this;
    }
    /**
     * @return Collection<int, Game>
     */
    public function getFavoriteGames(): Collection
    {
        return $this->favorite_games;
    }

    public function addFavoriteGame(Game $favoriteGame): static
    {
        if (!$this->favorite_games->contains($favoriteGame)) {
            $this->favorite_games->add($favoriteGame);
        }

        return $this;
    }

    public function removeFavoriteGame(Game $favoriteGame): static
    {
        $this->favorite_games->removeElement($favoriteGame);

        return $this;
    }

    /**
     * @return Collection<int, Team>
     */
    public function getFavoriteTeams(): Collection
    {
        return $this->favorite_teams;
    }

    public function addFavoriteTeam(Team $favoriteTeam): static
    {
        if (!$this->favorite_teams->contains($favoriteTeam)) {
            $this->favorite_teams->add($favoriteTeam);
        }

        return $this;
    }

    public function removeFavoriteTeam(Team $favoriteTeam): static
    {
        $this->favorite_teams->removeElement($favoriteTeam);

        return $this;
    }
}
