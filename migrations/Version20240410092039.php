<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240410092039 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE partners (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, logo VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partners_partners_categories (partners_id INT NOT NULL, partners_categories_id INT NOT NULL, INDEX IDX_22510165BDE7F1C6 (partners_id), INDEX IDX_22510165C1E54AD8 (partners_categories_id), PRIMARY KEY(partners_id, partners_categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partners_categories (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE partners_partners_categories ADD CONSTRAINT FK_22510165BDE7F1C6 FOREIGN KEY (partners_id) REFERENCES partners (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE partners_partners_categories ADD CONSTRAINT FK_22510165C1E54AD8 FOREIGN KEY (partners_categories_id) REFERENCES partners_categories (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partners_partners_categories DROP FOREIGN KEY FK_22510165BDE7F1C6');
        $this->addSql('ALTER TABLE partners_partners_categories DROP FOREIGN KEY FK_22510165C1E54AD8');
        $this->addSql('DROP TABLE partners');
        $this->addSql('DROP TABLE partners_partners_categories');
        $this->addSql('DROP TABLE partners_categories');
    }
}
