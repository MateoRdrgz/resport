<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241202150446 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matches DROP FOREIGN KEY FK_62615BA4D77E7D8');
        $this->addSql('ALTER TABLE matches DROP FOREIGN KEY FK_62615BA68756988');
        $this->addSql('ALTER TABLE matches DROP FOREIGN KEY FK_62615BA8A97161');
        $this->addSql('DROP INDEX IDX_62615BA8A97161 ON matches');
        $this->addSql('DROP INDEX IDX_62615BA68756988 ON matches');
        $this->addSql('DROP INDEX IDX_62615BA4D77E7D8 ON matches');
        $this->addSql('ALTER TABLE matches ADD league_id INT DEFAULT NULL, ADD winner_team_id INT DEFAULT NULL, ADD winner_player_id INT DEFAULT NULL, ADD season_id INT DEFAULT NULL, ADD game_id INT DEFAULT NULL, DROP league_id_id, DROP season_id_id, DROP game_id_id, DROP winner_id_team, DROP winner_id_player');
        $this->addSql('ALTER TABLE matches ADD CONSTRAINT FK_62615BA58AFC4DE FOREIGN KEY (league_id) REFERENCES leagues (id)');
        $this->addSql('ALTER TABLE matches ADD CONSTRAINT FK_62615BAC5237001 FOREIGN KEY (winner_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE matches ADD CONSTRAINT FK_62615BA6874926C FOREIGN KEY (winner_player_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE matches ADD CONSTRAINT FK_62615BA4EC001D1 FOREIGN KEY (season_id) REFERENCES saison (id)');
        $this->addSql('ALTER TABLE matches ADD CONSTRAINT FK_62615BAE48FD905 FOREIGN KEY (game_id) REFERENCES games (id)');
        $this->addSql('CREATE INDEX IDX_62615BA58AFC4DE ON matches (league_id)');
        $this->addSql('CREATE INDEX IDX_62615BAC5237001 ON matches (winner_team_id)');
        $this->addSql('CREATE INDEX IDX_62615BA6874926C ON matches (winner_player_id)');
        $this->addSql('CREATE INDEX IDX_62615BA4EC001D1 ON matches (season_id)');
        $this->addSql('CREATE INDEX IDX_62615BAE48FD905 ON matches (game_id)');
        $this->addSql('ALTER TABLE opponents DROP FOREIGN KEY FK_36A512AC633B95E6');
        $this->addSql('ALTER TABLE opponents DROP FOREIGN KEY FK_36A512ACA92B47A8');
        $this->addSql('ALTER TABLE opponents DROP FOREIGN KEY FK_36A512ACC12EE1F6');
        $this->addSql('DROP INDEX UNIQ_36A512AC633B95E6 ON opponents');
        $this->addSql('DROP INDEX UNIQ_36A512ACA92B47A8 ON opponents');
        $this->addSql('DROP INDEX IDX_36A512ACC12EE1F6 ON opponents');
        $this->addSql('ALTER TABLE opponents ADD match_id INT DEFAULT NULL, ADD opponent_team_id INT DEFAULT NULL, ADD opponent_player_id INT DEFAULT NULL, DROP match_id_id, DROP opponent_id_team_id, DROP opponent_id_player_id');
        $this->addSql('ALTER TABLE opponents ADD CONSTRAINT FK_36A512AC2ABEACD6 FOREIGN KEY (match_id) REFERENCES matches (id)');
        $this->addSql('ALTER TABLE opponents ADD CONSTRAINT FK_36A512AC242702A6 FOREIGN KEY (opponent_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE opponents ADD CONSTRAINT FK_36A512AC37394956 FOREIGN KEY (opponent_player_id) REFERENCES player (id)');
        $this->addSql('CREATE INDEX IDX_36A512AC2ABEACD6 ON opponents (match_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_36A512AC242702A6 ON opponents (opponent_team_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_36A512AC37394956 ON opponents (opponent_player_id)');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A654D77E7D8');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65B842D717');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65D8A48BBD');
        $this->addSql('DROP INDEX IDX_98197A65D8A48BBD ON player');
        $this->addSql('DROP INDEX IDX_98197A65B842D717 ON player');
        $this->addSql('DROP INDEX IDX_98197A654D77E7D8 ON player');
        $this->addSql('ALTER TABLE player ADD country_id INT DEFAULT NULL, ADD team_id INT DEFAULT NULL, ADD game_id INT DEFAULT NULL, DROP country_id_id, DROP team_id_id, DROP game_id_id');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65F92F3E70 FOREIGN KEY (country_id) REFERENCES countries (id)');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65E48FD905 FOREIGN KEY (game_id) REFERENCES games (id)');
        $this->addSql('CREATE INDEX IDX_98197A65F92F3E70 ON player (country_id)');
        $this->addSql('CREATE INDEX IDX_98197A65296CD8AE ON player (team_id)');
        $this->addSql('CREATE INDEX IDX_98197A65E48FD905 ON player (game_id)');
        $this->addSql('ALTER TABLE saison DROP FOREIGN KEY FK_C0D0D5868A97161');
        $this->addSql('DROP INDEX IDX_C0D0D5868A97161 ON saison');
        $this->addSql('ALTER TABLE saison CHANGE league_id_id league_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE saison ADD CONSTRAINT FK_C0D0D58658AFC4DE FOREIGN KEY (league_id) REFERENCES leagues (id)');
        $this->addSql('CREATE INDEX IDX_C0D0D58658AFC4DE ON saison (league_id)');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F4D77E7D8');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F918DB72');
        $this->addSql('DROP INDEX IDX_C4E0A61F918DB72 ON team');
        $this->addSql('DROP INDEX IDX_C4E0A61F4D77E7D8 ON team');
        $this->addSql('ALTER TABLE team ADD location_id INT DEFAULT NULL, ADD game_id INT DEFAULT NULL, DROP location_id_id, DROP game_id_id');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F64D218E FOREIGN KEY (location_id) REFERENCES countries (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61FE48FD905 FOREIGN KEY (game_id) REFERENCES games (id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F64D218E ON team (location_id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61FE48FD905 ON team (game_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matches DROP FOREIGN KEY FK_62615BA58AFC4DE');
        $this->addSql('ALTER TABLE matches DROP FOREIGN KEY FK_62615BAC5237001');
        $this->addSql('ALTER TABLE matches DROP FOREIGN KEY FK_62615BA6874926C');
        $this->addSql('ALTER TABLE matches DROP FOREIGN KEY FK_62615BA4EC001D1');
        $this->addSql('ALTER TABLE matches DROP FOREIGN KEY FK_62615BAE48FD905');
        $this->addSql('DROP INDEX IDX_62615BA58AFC4DE ON matches');
        $this->addSql('DROP INDEX IDX_62615BAC5237001 ON matches');
        $this->addSql('DROP INDEX IDX_62615BA6874926C ON matches');
        $this->addSql('DROP INDEX IDX_62615BA4EC001D1 ON matches');
        $this->addSql('DROP INDEX IDX_62615BAE48FD905 ON matches');
        $this->addSql('ALTER TABLE matches ADD league_id_id INT DEFAULT NULL, ADD season_id_id INT DEFAULT NULL, ADD game_id_id INT DEFAULT NULL, ADD winner_id_team INT DEFAULT NULL, ADD winner_id_player INT DEFAULT NULL, DROP league_id, DROP winner_team_id, DROP winner_player_id, DROP season_id, DROP game_id');
        $this->addSql('ALTER TABLE matches ADD CONSTRAINT FK_62615BA4D77E7D8 FOREIGN KEY (game_id_id) REFERENCES games (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE matches ADD CONSTRAINT FK_62615BA68756988 FOREIGN KEY (season_id_id) REFERENCES saison (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE matches ADD CONSTRAINT FK_62615BA8A97161 FOREIGN KEY (league_id_id) REFERENCES leagues (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_62615BA8A97161 ON matches (league_id_id)');
        $this->addSql('CREATE INDEX IDX_62615BA68756988 ON matches (season_id_id)');
        $this->addSql('CREATE INDEX IDX_62615BA4D77E7D8 ON matches (game_id_id)');
        $this->addSql('ALTER TABLE saison DROP FOREIGN KEY FK_C0D0D58658AFC4DE');
        $this->addSql('DROP INDEX IDX_C0D0D58658AFC4DE ON saison');
        $this->addSql('ALTER TABLE saison CHANGE league_id league_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE saison ADD CONSTRAINT FK_C0D0D5868A97161 FOREIGN KEY (league_id_id) REFERENCES leagues (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C0D0D5868A97161 ON saison (league_id_id)');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65F92F3E70');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65296CD8AE');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65E48FD905');
        $this->addSql('DROP INDEX IDX_98197A65F92F3E70 ON player');
        $this->addSql('DROP INDEX IDX_98197A65296CD8AE ON player');
        $this->addSql('DROP INDEX IDX_98197A65E48FD905 ON player');
        $this->addSql('ALTER TABLE player ADD country_id_id INT DEFAULT NULL, ADD team_id_id INT DEFAULT NULL, ADD game_id_id INT DEFAULT NULL, DROP country_id, DROP team_id, DROP game_id');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A654D77E7D8 FOREIGN KEY (game_id_id) REFERENCES games (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65B842D717 FOREIGN KEY (team_id_id) REFERENCES team (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65D8A48BBD FOREIGN KEY (country_id_id) REFERENCES countries (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_98197A65D8A48BBD ON player (country_id_id)');
        $this->addSql('CREATE INDEX IDX_98197A65B842D717 ON player (team_id_id)');
        $this->addSql('CREATE INDEX IDX_98197A654D77E7D8 ON player (game_id_id)');
        $this->addSql('ALTER TABLE opponents DROP FOREIGN KEY FK_36A512AC2ABEACD6');
        $this->addSql('ALTER TABLE opponents DROP FOREIGN KEY FK_36A512AC242702A6');
        $this->addSql('ALTER TABLE opponents DROP FOREIGN KEY FK_36A512AC37394956');
        $this->addSql('DROP INDEX IDX_36A512AC2ABEACD6 ON opponents');
        $this->addSql('DROP INDEX UNIQ_36A512AC242702A6 ON opponents');
        $this->addSql('DROP INDEX UNIQ_36A512AC37394956 ON opponents');
        $this->addSql('ALTER TABLE opponents ADD match_id_id INT DEFAULT NULL, ADD opponent_id_team_id INT DEFAULT NULL, ADD opponent_id_player_id INT DEFAULT NULL, DROP match_id, DROP opponent_team_id, DROP opponent_player_id');
        $this->addSql('ALTER TABLE opponents ADD CONSTRAINT FK_36A512AC633B95E6 FOREIGN KEY (opponent_id_team_id) REFERENCES team (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE opponents ADD CONSTRAINT FK_36A512ACA92B47A8 FOREIGN KEY (opponent_id_player_id) REFERENCES player (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE opponents ADD CONSTRAINT FK_36A512ACC12EE1F6 FOREIGN KEY (match_id_id) REFERENCES matches (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_36A512AC633B95E6 ON opponents (opponent_id_team_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_36A512ACA92B47A8 ON opponents (opponent_id_player_id)');
        $this->addSql('CREATE INDEX IDX_36A512ACC12EE1F6 ON opponents (match_id_id)');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F64D218E');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61FE48FD905');
        $this->addSql('DROP INDEX IDX_C4E0A61F64D218E ON team');
        $this->addSql('DROP INDEX IDX_C4E0A61FE48FD905 ON team');
        $this->addSql('ALTER TABLE team ADD location_id_id INT DEFAULT NULL, ADD game_id_id INT DEFAULT NULL, DROP location_id, DROP game_id');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F4D77E7D8 FOREIGN KEY (game_id_id) REFERENCES games (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F918DB72 FOREIGN KEY (location_id_id) REFERENCES countries (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C4E0A61F918DB72 ON team (location_id_id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F4D77E7D8 ON team (game_id_id)');
    }
}
