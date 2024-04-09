<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240408112000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE onglets_organigramme (id INT AUTO_INCREMENT NOT NULL, onglet1 VARCHAR(255) DEFAULT NULL, texte_onglet1 LONGTEXT DEFAULT NULL, onglet2 VARCHAR(255) DEFAULT NULL, texte_onglet2 LONGTEXT DEFAULT NULL, onglet3 VARCHAR(255) DEFAULT NULL, texte_onglet3 LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE onglets_organigramme');
    }
}
