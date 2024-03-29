<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240328154939 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blog_images_blogs (blog_id INT NOT NULL, images_blogs_id INT NOT NULL, INDEX IDX_83FFC44BDAE07E97 (blog_id), INDEX IDX_83FFC44B2AE326D6 (images_blogs_id), PRIMARY KEY(blog_id, images_blogs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images_blogs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, path VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blog_images_blogs ADD CONSTRAINT FK_83FFC44BDAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blog_images_blogs ADD CONSTRAINT FK_83FFC44B2AE326D6 FOREIGN KEY (images_blogs_id) REFERENCES images_blogs (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog_images_blogs DROP FOREIGN KEY FK_83FFC44BDAE07E97');
        $this->addSql('ALTER TABLE blog_images_blogs DROP FOREIGN KEY FK_83FFC44B2AE326D6');
        $this->addSql('DROP TABLE blog_images_blogs');
        $this->addSql('DROP TABLE images_blogs');
    }
}
