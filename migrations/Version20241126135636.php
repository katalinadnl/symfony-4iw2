<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241126135636 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media DROP CONSTRAINT fk_6a2ca10c8f93b6fc');
        $this->addSql('ALTER TABLE media DROP CONSTRAINT fk_6a2ca10cd94388bd');
        $this->addSql('ALTER TABLE season DROP CONSTRAINT fk_f0e45ba9d94388bd');
        $this->addSql('DROP SEQUENCE movie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE serie_id_seq CASCADE');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE serie');
        $this->addSql('DROP INDEX uniq_6a2ca10cd94388bd');
        $this->addSql('DROP INDEX uniq_6a2ca10c8f93b6fc');
        $this->addSql('ALTER TABLE media ADD type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE media DROP movie_id');
        $this->addSql('ALTER TABLE media DROP serie_id');
        $this->addSql('ALTER TABLE media RENAME COLUMN short_desicription TO short_description');
        $this->addSql('ALTER TABLE season DROP CONSTRAINT FK_F0E45BA9D94388BD');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA9D94388BD FOREIGN KEY (serie_id) REFERENCES media (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE movie_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE serie_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE movie (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE serie (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE media ADD movie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media ADD serie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media ADD short_desicription VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE media DROP short_description');
        $this->addSql('ALTER TABLE media DROP type');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT fk_6a2ca10c8f93b6fc FOREIGN KEY (movie_id) REFERENCES movie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT fk_6a2ca10cd94388bd FOREIGN KEY (serie_id) REFERENCES serie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_6a2ca10cd94388bd ON media (serie_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_6a2ca10c8f93b6fc ON media (movie_id)');
        $this->addSql('ALTER TABLE season DROP CONSTRAINT fk_f0e45ba9d94388bd');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT fk_f0e45ba9d94388bd FOREIGN KEY (serie_id) REFERENCES serie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
