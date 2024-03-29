<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240329140018 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blog_themes_blogs (blog_id INT NOT NULL, themes_blogs_id INT NOT NULL, INDEX IDX_FCDAAEFFDAE07E97 (blog_id), INDEX IDX_FCDAAEFF3CA2270F (themes_blogs_id), PRIMARY KEY(blog_id, themes_blogs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE themes_blogs (id INT AUTO_INCREMENT NOT NULL, theme VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blog_themes_blogs ADD CONSTRAINT FK_FCDAAEFFDAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blog_themes_blogs ADD CONSTRAINT FK_FCDAAEFF3CA2270F FOREIGN KEY (themes_blogs_id) REFERENCES themes_blogs (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog_themes_blogs DROP FOREIGN KEY FK_FCDAAEFFDAE07E97');
        $this->addSql('ALTER TABLE blog_themes_blogs DROP FOREIGN KEY FK_FCDAAEFF3CA2270F');
        $this->addSql('DROP TABLE blog_themes_blogs');
        $this->addSql('DROP TABLE themes_blogs');
    }
}
