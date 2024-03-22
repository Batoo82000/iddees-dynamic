<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240321094559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE horaires_apports (id INT AUTO_INCREMENT NOT NULL, sites_iddees_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, lundi VARCHAR(45) DEFAULT NULL, mardi VARCHAR(45) DEFAULT NULL, mercredi VARCHAR(45) DEFAULT NULL, jeudi VARCHAR(45) DEFAULT NULL, vendredi VARCHAR(45) DEFAULT NULL, samedi VARCHAR(45) DEFAULT NULL, UNIQUE INDEX UNIQ_6036AA7535E3A3AA (sites_iddees_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE horaires_apports ADD CONSTRAINT FK_6036AA7535E3A3AA FOREIGN KEY (sites_iddees_id) REFERENCES sites_iddees (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE horaires_apports DROP FOREIGN KEY FK_6036AA7535E3A3AA');
        $this->addSql('DROP TABLE horaires_apports');
    }
}
