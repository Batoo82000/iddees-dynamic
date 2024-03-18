<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240315154411 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE localisation_sites (id INT AUTO_INCREMENT NOT NULL, site VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE organigramme ADD localisation_sites_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE organigramme ADD CONSTRAINT FK_9CCC2B10F18F8315 FOREIGN KEY (localisation_sites_id) REFERENCES localisation_sites (id)');
        $this->addSql('CREATE INDEX IDX_9CCC2B10F18F8315 ON organigramme (localisation_sites_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE organigramme DROP FOREIGN KEY FK_9CCC2B10F18F8315');
        $this->addSql('DROP TABLE localisation_sites');
        $this->addSql('DROP INDEX IDX_9CCC2B10F18F8315 ON organigramme');
        $this->addSql('ALTER TABLE organigramme DROP localisation_sites_id');
    }
}
