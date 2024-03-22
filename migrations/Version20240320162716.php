<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240320162716 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE horaires_magasin (id INT AUTO_INCREMENT NOT NULL, sites_iddees_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, lundi VARCHAR(45) NOT NULL, mardi VARCHAR(45) NOT NULL, mercredi VARCHAR(45) NOT NULL, jeudi VARCHAR(45) NOT NULL, vendredi VARCHAR(45) NOT NULL, samedi VARCHAR(45) NOT NULL, UNIQUE INDEX UNIQ_C0AB476C35E3A3AA (sites_iddees_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE horaires_magasin ADD CONSTRAINT FK_C0AB476C35E3A3AA FOREIGN KEY (sites_iddees_id) REFERENCES sites_iddees (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE horaires_magasin DROP FOREIGN KEY FK_C0AB476C35E3A3AA');
        $this->addSql('DROP TABLE horaires_magasin');
    }
}
