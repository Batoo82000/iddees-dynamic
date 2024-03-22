<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240320092734 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sites_iddees DROP FOREIGN KEY FK_751B8A16AF29AE11');
        $this->addSql('DROP TABLE horaires_apports');
        $this->addSql('ALTER TABLE horaires ADD minute_debut_matin SMALLINT NOT NULL, ADD minute_fin_matin SMALLINT NOT NULL, ADD minute_debut_apres_midi SMALLINT NOT NULL, ADD minute_fin_apres_midi SMALLINT NOT NULL');
        $this->addSql('DROP INDEX IDX_751B8A16AF29AE11 ON sites_iddees');
        $this->addSql('ALTER TABLE sites_iddees DROP horaires_apports_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE horaires_apports (id INT AUTO_INCREMENT NOT NULL, jour_debut VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, jour_fin VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, heure_debut_matin SMALLINT DEFAULT NULL, heure_fin_matin SMALLINT DEFAULT NULL, heure_debut_apres_midi SMALLINT DEFAULT NULL, heure_fin_apres_midi SMALLINT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE horaires DROP minute_debut_matin, DROP minute_fin_matin, DROP minute_debut_apres_midi, DROP minute_fin_apres_midi');
        $this->addSql('ALTER TABLE sites_iddees ADD horaires_apports_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sites_iddees ADD CONSTRAINT FK_751B8A16AF29AE11 FOREIGN KEY (horaires_apports_id) REFERENCES horaires_apports (id)');
        $this->addSql('CREATE INDEX IDX_751B8A16AF29AE11 ON sites_iddees (horaires_apports_id)');
    }
}
