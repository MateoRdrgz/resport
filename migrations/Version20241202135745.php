<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241202135745 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE countries (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(3) NOT NULL, name VARCHAR(255) NOT NULL, flag_url VARCHAR(512) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE games (id INT AUTO_INCREMENT NOT NULL, is_esport TINYINT(1) NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) DEFAULT NULL, api_entrypoint VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE leagues (id INT AUTO_INCREMENT NOT NULL, game_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, image_url VARCHAR(255) DEFAULT NULL, modified_at DATETIME NOT NULL, url VARCHAR(255) DEFAULT NULL, INDEX IDX_85CE39EE48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matches (id INT AUTO_INCREMENT NOT NULL, league_id_id INT DEFAULT NULL, season_id_id INT DEFAULT NULL, game_id_id INT DEFAULT NULL, begin_at DATETIME DEFAULT NULL, end_at DATETIME DEFAULT NULL, winner_id_team INT DEFAULT NULL, winner_id_player INT DEFAULT NULL, status VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, modified_at DATETIME NOT NULL, INDEX IDX_62615BA8A97161 (league_id_id), INDEX IDX_62615BA68756988 (season_id_id), INDEX IDX_62615BA4D77E7D8 (game_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opponents (id INT AUTO_INCREMENT NOT NULL, match_id_id INT DEFAULT NULL, opponent_id_team_id INT DEFAULT NULL, opponent_id_player_id INT DEFAULT NULL, INDEX IDX_36A512ACC12EE1F6 (match_id_id), UNIQUE INDEX UNIQ_36A512AC633B95E6 (opponent_id_team_id), UNIQUE INDEX UNIQ_36A512ACA92B47A8 (opponent_id_player_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player (id INT AUTO_INCREMENT NOT NULL, country_id_id INT DEFAULT NULL, team_id_id INT DEFAULT NULL, game_id_id INT DEFAULT NULL, active TINYINT(1) NOT NULL, name VARCHAR(255) NOT NULL, modified_at DATETIME NOT NULL, age INT DEFAULT NULL, birthday DATETIME DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, image_url VARCHAR(255) DEFAULT NULL, INDEX IDX_98197A65D8A48BBD (country_id_id), INDEX IDX_98197A65B842D717 (team_id_id), INDEX IDX_98197A654D77E7D8 (game_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saison (id INT AUTO_INCREMENT NOT NULL, league_id_id INT DEFAULT NULL, begin_at DATETIME DEFAULT NULL, finished_at DATETIME DEFAULT NULL, modified_at DATETIME NOT NULL, full_name VARCHAR(255) NOT NULL, INDEX IDX_C0D0D5868A97161 (league_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, location_id_id INT DEFAULT NULL, game_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, acronym VARCHAR(255) DEFAULT NULL, image_url VARCHAR(512) DEFAULT NULL, modified_at DATETIME NOT NULL, INDEX IDX_C4E0A61F918DB72 (location_id_id), INDEX IDX_C4E0A61F4D77E7D8 (game_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_player (user_id INT NOT NULL, player_id INT NOT NULL, INDEX IDX_FD4B6158A76ED395 (user_id), INDEX IDX_FD4B615899E6F5DF (player_id), PRIMARY KEY(user_id, player_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_game (user_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_59AA7D45A76ED395 (user_id), INDEX IDX_59AA7D45E48FD905 (game_id), PRIMARY KEY(user_id, game_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_team (user_id INT NOT NULL, team_id INT NOT NULL, INDEX IDX_BE61EAD6A76ED395 (user_id), INDEX IDX_BE61EAD6296CD8AE (team_id), PRIMARY KEY(user_id, team_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE leagues ADD CONSTRAINT FK_85CE39EE48FD905 FOREIGN KEY (game_id) REFERENCES games (id)');
        $this->addSql('ALTER TABLE matches ADD CONSTRAINT FK_62615BA8A97161 FOREIGN KEY (league_id_id) REFERENCES leagues (id)');
        $this->addSql('ALTER TABLE matches ADD CONSTRAINT FK_62615BA68756988 FOREIGN KEY (season_id_id) REFERENCES saison (id)');
        $this->addSql('ALTER TABLE matches ADD CONSTRAINT FK_62615BA4D77E7D8 FOREIGN KEY (game_id_id) REFERENCES games (id)');
        $this->addSql('ALTER TABLE opponents ADD CONSTRAINT FK_36A512ACC12EE1F6 FOREIGN KEY (match_id_id) REFERENCES matches (id)');
        $this->addSql('ALTER TABLE opponents ADD CONSTRAINT FK_36A512AC633B95E6 FOREIGN KEY (opponent_id_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE opponents ADD CONSTRAINT FK_36A512ACA92B47A8 FOREIGN KEY (opponent_id_player_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65D8A48BBD FOREIGN KEY (country_id_id) REFERENCES countries (id)');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65B842D717 FOREIGN KEY (team_id_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A654D77E7D8 FOREIGN KEY (game_id_id) REFERENCES games (id)');
        $this->addSql('ALTER TABLE saison ADD CONSTRAINT FK_C0D0D5868A97161 FOREIGN KEY (league_id_id) REFERENCES leagues (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F918DB72 FOREIGN KEY (location_id_id) REFERENCES countries (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F4D77E7D8 FOREIGN KEY (game_id_id) REFERENCES games (id)');
        $this->addSql('ALTER TABLE user_player ADD CONSTRAINT FK_FD4B6158A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_player ADD CONSTRAINT FK_FD4B615899E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_game ADD CONSTRAINT FK_59AA7D45A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_game ADD CONSTRAINT FK_59AA7D45E48FD905 FOREIGN KEY (game_id) REFERENCES games (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_team ADD CONSTRAINT FK_BE61EAD6A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_team ADD CONSTRAINT FK_BE61EAD6296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE leagues DROP FOREIGN KEY FK_85CE39EE48FD905');
        $this->addSql('ALTER TABLE matches DROP FOREIGN KEY FK_62615BA8A97161');
        $this->addSql('ALTER TABLE matches DROP FOREIGN KEY FK_62615BA68756988');
        $this->addSql('ALTER TABLE matches DROP FOREIGN KEY FK_62615BA4D77E7D8');
        $this->addSql('ALTER TABLE opponents DROP FOREIGN KEY FK_36A512ACC12EE1F6');
        $this->addSql('ALTER TABLE opponents DROP FOREIGN KEY FK_36A512AC633B95E6');
        $this->addSql('ALTER TABLE opponents DROP FOREIGN KEY FK_36A512ACA92B47A8');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65D8A48BBD');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65B842D717');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A654D77E7D8');
        $this->addSql('ALTER TABLE saison DROP FOREIGN KEY FK_C0D0D5868A97161');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F918DB72');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F4D77E7D8');
        $this->addSql('ALTER TABLE user_player DROP FOREIGN KEY FK_FD4B6158A76ED395');
        $this->addSql('ALTER TABLE user_player DROP FOREIGN KEY FK_FD4B615899E6F5DF');
        $this->addSql('ALTER TABLE user_game DROP FOREIGN KEY FK_59AA7D45A76ED395');
        $this->addSql('ALTER TABLE user_game DROP FOREIGN KEY FK_59AA7D45E48FD905');
        $this->addSql('ALTER TABLE user_team DROP FOREIGN KEY FK_BE61EAD6A76ED395');
        $this->addSql('ALTER TABLE user_team DROP FOREIGN KEY FK_BE61EAD6296CD8AE');
        $this->addSql('DROP TABLE countries');
        $this->addSql('DROP TABLE games');
        $this->addSql('DROP TABLE leagues');
        $this->addSql('DROP TABLE matches');
        $this->addSql('DROP TABLE opponents');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE saison');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE user_player');
        $this->addSql('DROP TABLE user_game');
        $this->addSql('DROP TABLE user_team');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
