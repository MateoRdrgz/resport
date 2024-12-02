<?php

namespace App\Factory;

use App\Entity\Game;

class GameFactory
{
    public function createGameFromApi(array $data,bool $is_esport): Game
    {
        $game = new Game();
        $game->setName($data['name']);
        $game->setEsport($is_esport);
        $game->setSlug($data['slug']);
        return $game;
    }

    public function createManyGamesFromApi(array $data,bool $is_esport): array
    {
        $games = [];
        foreach ($data as $gameData) {
            $games[] = $this->createGameFromApi($gameData,$is_esport);
        }
        return $games;
    }
}