<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240328150012 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blog_videos_blogs (blog_id INT NOT NULL, videos_blogs_id INT NOT NULL, INDEX IDX_14B53A4EDAE07E97 (blog_id), INDEX IDX_14B53A4E301E8017 (videos_blogs_id), PRIMARY KEY(blog_id, videos_blogs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE videos_blogs (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(100) NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blog_videos_blogs ADD CONSTRAINT FK_14B53A4EDAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blog_videos_blogs ADD CONSTRAINT FK_14B53A4E301E8017 FOREIGN KEY (videos_blogs_id) REFERENCES videos_blogs (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog_videos_blogs DROP FOREIGN KEY FK_14B53A4EDAE07E97');
        $this->addSql('ALTER TABLE blog_videos_blogs DROP FOREIGN KEY FK_14B53A4E301E8017');
        $this->addSql('DROP TABLE blog_videos_blogs');
        $this->addSql('DROP TABLE videos_blogs');
    }
}
