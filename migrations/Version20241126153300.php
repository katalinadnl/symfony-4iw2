<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241126153300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE media_category (media_id INT NOT NULL, category_id INT NOT NULL, PRIMARY KEY(media_id, category_id))');
        $this->addSql('CREATE INDEX IDX_92D3773EA9FDD75 ON media_category (media_id)');
        $this->addSql('CREATE INDEX IDX_92D377312469DE2 ON media_category (category_id)');
        $this->addSql('CREATE TABLE media_language (media_id INT NOT NULL, language_id INT NOT NULL, PRIMARY KEY(media_id, language_id))');
        $this->addSql('CREATE INDEX IDX_DBBA5F07EA9FDD75 ON media_language (media_id)');
        $this->addSql('CREATE INDEX IDX_DBBA5F0782F1BAF4 ON media_language (language_id)');
        $this->addSql('CREATE TABLE movie (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE serie (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE media_category ADD CONSTRAINT FK_92D3773EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE media_category ADD CONSTRAINT FK_92D377312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE media_language ADD CONSTRAINT FK_DBBA5F07EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE media_language ADD CONSTRAINT FK_DBBA5F0782F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26FBF396750 FOREIGN KEY (id) REFERENCES media (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A9334BF396750 FOREIGN KEY (id) REFERENCES media (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE category_media DROP CONSTRAINT fk_821fee4512469de2');
        $this->addSql('ALTER TABLE category_media DROP CONSTRAINT fk_821fee45ea9fdd75');
        $this->addSql('ALTER TABLE language_media DROP CONSTRAINT fk_1574a55d82f1baf4');
        $this->addSql('ALTER TABLE language_media DROP CONSTRAINT fk_1574a55dea9fdd75');
        $this->addSql('DROP TABLE category_media');
        $this->addSql('DROP TABLE language_media');
        $this->addSql('ALTER TABLE category ADD nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE category DROP name');
        $this->addSql('ALTER TABLE category ALTER label TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT fk_9474526cf675f31b');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT fk_9474526c727aca70');
        $this->addSql('DROP INDEX idx_9474526c727aca70');
        $this->addSql('DROP INDEX idx_9474526cf675f31b');
        $this->addSql('ALTER TABLE comment ADD publisher_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD content TEXT NOT NULL');
        $this->addSql('ALTER TABLE comment DROP author_id');
        $this->addSql('ALTER TABLE comment DROP user_id');
        $this->addSql('ALTER TABLE comment RENAME COLUMN parent_id TO parent_comment_id');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CBF2AF943 FOREIGN KEY (parent_comment_id) REFERENCES comment (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C40C86FCE FOREIGN KEY (publisher_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9474526CBF2AF943 ON comment (parent_comment_id)');
        $this->addSql('CREATE INDEX IDX_9474526C40C86FCE ON comment (publisher_id)');
        $this->addSql('ALTER TABLE episode ADD released_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE episode DROP release_date');
        $this->addSql('COMMENT ON COLUMN episode.released_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE language ADD nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE language DROP name');
        $this->addSql('ALTER TABLE language ALTER code TYPE VARCHAR(3)');
        $this->addSql('ALTER TABLE media DROP CONSTRAINT fk_6a2ca10c17421b18');
        $this->addSql('DROP INDEX uniq_6a2ca10cd94388bd');
        $this->addSql('DROP INDEX uniq_6a2ca10c8f93b6fc');
        $this->addSql('DROP INDEX idx_6a2ca10c17421b18');
        $this->addSql('ALTER TABLE media ADD short_description TEXT NOT NULL');
        $this->addSql('ALTER TABLE media ADD staff JSON NOT NULL');
        $this->addSql('ALTER TABLE media ADD casting JSON NOT NULL');
        $this->addSql('ALTER TABLE media ADD mediaType VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE media DROP playlist_media_id');
        $this->addSql('ALTER TABLE media DROP movie_id');
        $this->addSql('ALTER TABLE media DROP serie_id');
        $this->addSql('ALTER TABLE media DROP media_type');
        $this->addSql('ALTER TABLE media DROP short_desicription');
        $this->addSql('ALTER TABLE media ALTER long_description TYPE TEXT');
        $this->addSql('ALTER TABLE media ALTER release_date TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE playlist ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE playlist DROP update_at');
        $this->addSql('ALTER TABLE playlist ALTER created_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('COMMENT ON COLUMN playlist.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN playlist.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE playlist_media ADD media_id INT NOT NULL');
        $this->addSql('ALTER TABLE playlist_media ALTER added_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('COMMENT ON COLUMN playlist_media.added_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84FEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_C930B84FEA9FDD75 ON playlist_media (media_id)');
        $this->addSql('ALTER TABLE playlist_subscription ALTER subscribed_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('COMMENT ON COLUMN playlist_subscription.subscribed_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE season ADD number VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE season DROP season_number');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA9D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE subscription_history ADD subscriber_id INT NOT NULL');
        $this->addSql('ALTER TABLE subscription_history ADD start_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE subscription_history ADD end_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE subscription_history DROP start_date');
        $this->addSql('ALTER TABLE subscription_history DROP end_date');
        $this->addSql('ALTER TABLE subscription_history ALTER subscription_id SET NOT NULL');
        $this->addSql('COMMENT ON COLUMN subscription_history.start_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN subscription_history.end_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D07808B1AD FOREIGN KEY (subscriber_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_54AF90D07808B1AD ON subscription_history (subscriber_id)');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT fk_8d93d649dce0c437');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT fk_8d93d6499a1887dc');
        $this->addSql('DROP INDEX idx_8d93d6499a1887dc');
        $this->addSql('DROP INDEX idx_8d93d649dce0c437');
        $this->addSql('ALTER TABLE "user" ADD profile_picture VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" DROP subscription_history_id');
        $this->addSql('ALTER TABLE "user" RENAME COLUMN subscription_id TO current_subscription_id');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D649DDE45DDE FOREIGN KEY (current_subscription_id) REFERENCES subscription (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_8D93D649DDE45DDE ON "user" (current_subscription_id)');
        $this->addSql('ALTER TABLE watch_history ADD last_watched_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE watch_history DROP last_watched');
        $this->addSql('ALTER TABLE watch_history ALTER watcher_id SET NOT NULL');
        $this->addSql('ALTER TABLE watch_history ALTER media_id SET NOT NULL');
        $this->addSql('COMMENT ON COLUMN watch_history.last_watched_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE season DROP CONSTRAINT FK_F0E45BA9D94388BD');
        $this->addSql('CREATE TABLE category_media (category_id INT NOT NULL, media_id INT NOT NULL, PRIMARY KEY(category_id, media_id))');
        $this->addSql('CREATE INDEX idx_821fee45ea9fdd75 ON category_media (media_id)');
        $this->addSql('CREATE INDEX idx_821fee4512469de2 ON category_media (category_id)');
        $this->addSql('CREATE TABLE language_media (language_id INT NOT NULL, media_id INT NOT NULL, PRIMARY KEY(language_id, media_id))');
        $this->addSql('CREATE INDEX idx_1574a55dea9fdd75 ON language_media (media_id)');
        $this->addSql('CREATE INDEX idx_1574a55d82f1baf4 ON language_media (language_id)');
        $this->addSql('ALTER TABLE category_media ADD CONSTRAINT fk_821fee4512469de2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE category_media ADD CONSTRAINT fk_821fee45ea9fdd75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE language_media ADD CONSTRAINT fk_1574a55d82f1baf4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE language_media ADD CONSTRAINT fk_1574a55dea9fdd75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE media_category DROP CONSTRAINT FK_92D3773EA9FDD75');
        $this->addSql('ALTER TABLE media_category DROP CONSTRAINT FK_92D377312469DE2');
        $this->addSql('ALTER TABLE media_language DROP CONSTRAINT FK_DBBA5F07EA9FDD75');
        $this->addSql('ALTER TABLE media_language DROP CONSTRAINT FK_DBBA5F0782F1BAF4');
        $this->addSql('ALTER TABLE movie DROP CONSTRAINT FK_1D5EF26FBF396750');
        $this->addSql('ALTER TABLE serie DROP CONSTRAINT FK_AA3A9334BF396750');
        $this->addSql('DROP TABLE media_category');
        $this->addSql('DROP TABLE media_language');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE serie');
        $this->addSql('ALTER TABLE episode ADD release_date INT NOT NULL');
        $this->addSql('ALTER TABLE episode DROP released_at');
        $this->addSql('ALTER TABLE season ADD season_number INT NOT NULL');
        $this->addSql('ALTER TABLE season DROP number');
        $this->addSql('ALTER TABLE category ADD name VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE category DROP nom');
        $this->addSql('ALTER TABLE category ALTER label TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE subscription_history DROP CONSTRAINT FK_54AF90D07808B1AD');
        $this->addSql('DROP INDEX IDX_54AF90D07808B1AD');
        $this->addSql('ALTER TABLE subscription_history ADD end_date INT NOT NULL');
        $this->addSql('ALTER TABLE subscription_history DROP start_at');
        $this->addSql('ALTER TABLE subscription_history DROP end_at');
        $this->addSql('ALTER TABLE subscription_history ALTER subscription_id DROP NOT NULL');
        $this->addSql('ALTER TABLE subscription_history RENAME COLUMN subscriber_id TO start_date');
        $this->addSql('ALTER TABLE playlist_media DROP CONSTRAINT FK_C930B84FEA9FDD75');
        $this->addSql('DROP INDEX IDX_C930B84FEA9FDD75');
        $this->addSql('ALTER TABLE playlist_media DROP media_id');
        $this->addSql('ALTER TABLE playlist_media ALTER added_at TYPE INT');
        $this->addSql('COMMENT ON COLUMN playlist_media.added_at IS NULL');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526CBF2AF943');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526C40C86FCE');
        $this->addSql('DROP INDEX IDX_9474526CBF2AF943');
        $this->addSql('DROP INDEX IDX_9474526C40C86FCE');
        $this->addSql('ALTER TABLE comment ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment DROP content');
        $this->addSql('ALTER TABLE comment RENAME COLUMN publisher_id TO author_id');
        $this->addSql('ALTER TABLE comment RENAME COLUMN parent_comment_id TO parent_id');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT fk_9474526cf675f31b FOREIGN KEY (author_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT fk_9474526c727aca70 FOREIGN KEY (parent_id) REFERENCES comment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_9474526c727aca70 ON comment (parent_id)');
        $this->addSql('CREATE INDEX idx_9474526cf675f31b ON comment (author_id)');
        $this->addSql('ALTER TABLE playlist_subscription ALTER subscribed_at TYPE INT');
        $this->addSql('COMMENT ON COLUMN playlist_subscription.subscribed_at IS NULL');
        $this->addSql('ALTER TABLE media ADD playlist_media_id INT NOT NULL');
        $this->addSql('ALTER TABLE media ADD movie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media ADD serie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media ADD short_desicription VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE media DROP short_description');
        $this->addSql('ALTER TABLE media DROP staff');
        $this->addSql('ALTER TABLE media DROP casting');
        $this->addSql('ALTER TABLE media ALTER long_description TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE media ALTER release_date TYPE INT');
        $this->addSql('ALTER TABLE media RENAME COLUMN mediaType TO media_type');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT fk_6a2ca10c17421b18 FOREIGN KEY (playlist_media_id) REFERENCES playlist_media (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_6a2ca10cd94388bd ON media (serie_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_6a2ca10c8f93b6fc ON media (movie_id)');
        $this->addSql('CREATE INDEX idx_6a2ca10c17421b18 ON media (playlist_media_id)');
        $this->addSql('ALTER TABLE language ADD name VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE language DROP nom');
        $this->addSql('ALTER TABLE language ALTER code TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE playlist ADD update_at INT NOT NULL');
        $this->addSql('ALTER TABLE playlist DROP updated_at');
        $this->addSql('ALTER TABLE playlist ALTER created_at TYPE INT');
        $this->addSql('COMMENT ON COLUMN playlist.created_at IS NULL');
        $this->addSql('ALTER TABLE watch_history ADD last_watched INT NOT NULL');
        $this->addSql('ALTER TABLE watch_history DROP last_watched_at');
        $this->addSql('ALTER TABLE watch_history ALTER watcher_id DROP NOT NULL');
        $this->addSql('ALTER TABLE watch_history ALTER media_id DROP NOT NULL');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D649DDE45DDE');
        $this->addSql('DROP INDEX IDX_8D93D649DDE45DDE');
        $this->addSql('ALTER TABLE "user" ADD subscription_history_id INT NOT NULL');
        $this->addSql('ALTER TABLE "user" DROP profile_picture');
        $this->addSql('ALTER TABLE "user" RENAME COLUMN current_subscription_id TO subscription_id');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT fk_8d93d649dce0c437 FOREIGN KEY (subscription_history_id) REFERENCES subscription_history (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT fk_8d93d6499a1887dc FOREIGN KEY (subscription_id) REFERENCES subscription (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_8d93d6499a1887dc ON "user" (subscription_id)');
        $this->addSql('CREATE INDEX idx_8d93d649dce0c437 ON "user" (subscription_history_id)');
    }
}
