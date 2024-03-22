<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240321095137 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE horaires_magasin CHANGE lundi lundi VARCHAR(45) DEFAULT NULL, CHANGE mardi mardi VARCHAR(45) DEFAULT NULL, CHANGE mercredi mercredi VARCHAR(45) DEFAULT NULL, CHANGE jeudi jeudi VARCHAR(45) DEFAULT NULL, CHANGE vendredi vendredi VARCHAR(45) DEFAULT NULL, CHANGE samedi samedi VARCHAR(45) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE horaires_magasin CHANGE lundi lundi VARCHAR(45) NOT NULL, CHANGE mardi mardi VARCHAR(45) NOT NULL, CHANGE mercredi mercredi VARCHAR(45) NOT NULL, CHANGE jeudi jeudi VARCHAR(45) NOT NULL, CHANGE vendredi vendredi VARCHAR(45) NOT NULL, CHANGE samedi samedi VARCHAR(45) NOT NULL');
    }
}
