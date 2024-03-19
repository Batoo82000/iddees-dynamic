<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240319135814 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE horaires (id INT AUTO_INCREMENT NOT NULL, jour_debut VARCHAR(10) NOT NULL, jour_fin VARCHAR(10) NOT NULL, heure_debut_matin SMALLINT NOT NULL, heure_fin_matin SMALLINT NOT NULL, heure_debut_apres_midi SMALLINT NOT NULL, heure_fin_apres_midi SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sites_iddees (id INT AUTO_INCREMENT NOT NULL, horaires_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, carte LONGTEXT NOT NULL, mention_speciale VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, code_postal INT DEFAULT NULL, ville VARCHAR(50) NOT NULL, telephone INT DEFAULT NULL, email VARCHAR(50) NOT NULL, INDEX IDX_751B8A168AF49C8B (horaires_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sites_iddees ADD CONSTRAINT FK_751B8A168AF49C8B FOREIGN KEY (horaires_id) REFERENCES horaires (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sites_iddees DROP FOREIGN KEY FK_751B8A168AF49C8B');
        $this->addSql('DROP TABLE horaires');
        $this->addSql('DROP TABLE sites_iddees');
    }
}
