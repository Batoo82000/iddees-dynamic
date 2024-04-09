<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240408075949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accueil (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(80) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE auteurs_blogs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, auteur_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', texte_blog LONGTEXT NOT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_C015514360BB6FE6 (auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog_sources (blog_id INT NOT NULL, sources_id INT NOT NULL, INDEX IDX_3EABD871DAE07E97 (blog_id), INDEX IDX_3EABD871DD51D0F7 (sources_id), PRIMARY KEY(blog_id, sources_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog_videos_blogs (blog_id INT NOT NULL, videos_blogs_id INT NOT NULL, INDEX IDX_14B53A4EDAE07E97 (blog_id), INDEX IDX_14B53A4E301E8017 (videos_blogs_id), PRIMARY KEY(blog_id, videos_blogs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog_images_blogs (blog_id INT NOT NULL, images_blogs_id INT NOT NULL, INDEX IDX_83FFC44BDAE07E97 (blog_id), INDEX IDX_83FFC44B2AE326D6 (images_blogs_id), PRIMARY KEY(blog_id, images_blogs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog_themes_blogs (blog_id INT NOT NULL, themes_blogs_id INT NOT NULL, INDEX IDX_FCDAAEFFDAE07E97 (blog_id), INDEX IDX_FCDAAEFF3CA2270F (themes_blogs_id), PRIMARY KEY(blog_id, themes_blogs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horaires_apports (id INT AUTO_INCREMENT NOT NULL, sites_iddees_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, lundi VARCHAR(45) DEFAULT NULL, mardi VARCHAR(45) DEFAULT NULL, mercredi VARCHAR(45) DEFAULT NULL, jeudi VARCHAR(45) DEFAULT NULL, vendredi VARCHAR(45) DEFAULT NULL, samedi VARCHAR(45) DEFAULT NULL, UNIQUE INDEX UNIQ_6036AA7535E3A3AA (sites_iddees_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horaires_magasin (id INT AUTO_INCREMENT NOT NULL, sites_iddees_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, lundi VARCHAR(45) DEFAULT NULL, mardi VARCHAR(45) DEFAULT NULL, mercredi VARCHAR(45) DEFAULT NULL, jeudi VARCHAR(45) DEFAULT NULL, vendredi VARCHAR(45) DEFAULT NULL, samedi VARCHAR(45) DEFAULT NULL, UNIQUE INDEX UNIQ_C0AB476C35E3A3AA (sites_iddees_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images_blogs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, path VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE localisation_sites (id INT AUTO_INCREMENT NOT NULL, site VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE organigramme (id INT AUTO_INCREMENT NOT NULL, role_organigramme_id INT DEFAULT NULL, localisation_sites_id INT DEFAULT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, photo VARCHAR(255) DEFAULT NULL, INDEX IDX_9CCC2B1051160984 (role_organigramme_id), INDEX IDX_9CCC2B10F18F8315 (localisation_sites_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_organigramme (id INT AUTO_INCREMENT NOT NULL, role VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sites_iddees (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, carte LONGTEXT NOT NULL, mention_speciale VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, code_postal INT DEFAULT NULL, ville VARCHAR(50) NOT NULL, telephone INT DEFAULT NULL, email VARCHAR(50) NOT NULL, photo VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sources (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE themes_blogs (id INT AUTO_INCREMENT NOT NULL, theme VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE videos_blogs (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(100) NOT NULL, url LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C015514360BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteurs_blogs (id)');
        $this->addSql('ALTER TABLE blog_sources ADD CONSTRAINT FK_3EABD871DAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blog_sources ADD CONSTRAINT FK_3EABD871DD51D0F7 FOREIGN KEY (sources_id) REFERENCES sources (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blog_videos_blogs ADD CONSTRAINT FK_14B53A4EDAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blog_videos_blogs ADD CONSTRAINT FK_14B53A4E301E8017 FOREIGN KEY (videos_blogs_id) REFERENCES videos_blogs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blog_images_blogs ADD CONSTRAINT FK_83FFC44BDAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blog_images_blogs ADD CONSTRAINT FK_83FFC44B2AE326D6 FOREIGN KEY (images_blogs_id) REFERENCES images_blogs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blog_themes_blogs ADD CONSTRAINT FK_FCDAAEFFDAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blog_themes_blogs ADD CONSTRAINT FK_FCDAAEFF3CA2270F FOREIGN KEY (themes_blogs_id) REFERENCES themes_blogs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE horaires_apports ADD CONSTRAINT FK_6036AA7535E3A3AA FOREIGN KEY (sites_iddees_id) REFERENCES sites_iddees (id)');
        $this->addSql('ALTER TABLE horaires_magasin ADD CONSTRAINT FK_C0AB476C35E3A3AA FOREIGN KEY (sites_iddees_id) REFERENCES sites_iddees (id)');
        $this->addSql('ALTER TABLE organigramme ADD CONSTRAINT FK_9CCC2B1051160984 FOREIGN KEY (role_organigramme_id) REFERENCES role_organigramme (id)');
        $this->addSql('ALTER TABLE organigramme ADD CONSTRAINT FK_9CCC2B10F18F8315 FOREIGN KEY (localisation_sites_id) REFERENCES localisation_sites (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C015514360BB6FE6');
        $this->addSql('ALTER TABLE blog_sources DROP FOREIGN KEY FK_3EABD871DAE07E97');
        $this->addSql('ALTER TABLE blog_sources DROP FOREIGN KEY FK_3EABD871DD51D0F7');
        $this->addSql('ALTER TABLE blog_videos_blogs DROP FOREIGN KEY FK_14B53A4EDAE07E97');
        $this->addSql('ALTER TABLE blog_videos_blogs DROP FOREIGN KEY FK_14B53A4E301E8017');
        $this->addSql('ALTER TABLE blog_images_blogs DROP FOREIGN KEY FK_83FFC44BDAE07E97');
        $this->addSql('ALTER TABLE blog_images_blogs DROP FOREIGN KEY FK_83FFC44B2AE326D6');
        $this->addSql('ALTER TABLE blog_themes_blogs DROP FOREIGN KEY FK_FCDAAEFFDAE07E97');
        $this->addSql('ALTER TABLE blog_themes_blogs DROP FOREIGN KEY FK_FCDAAEFF3CA2270F');
        $this->addSql('ALTER TABLE horaires_apports DROP FOREIGN KEY FK_6036AA7535E3A3AA');
        $this->addSql('ALTER TABLE horaires_magasin DROP FOREIGN KEY FK_C0AB476C35E3A3AA');
        $this->addSql('ALTER TABLE organigramme DROP FOREIGN KEY FK_9CCC2B1051160984');
        $this->addSql('ALTER TABLE organigramme DROP FOREIGN KEY FK_9CCC2B10F18F8315');
        $this->addSql('DROP TABLE accueil');
        $this->addSql('DROP TABLE auteurs_blogs');
        $this->addSql('DROP TABLE blog');
        $this->addSql('DROP TABLE blog_sources');
        $this->addSql('DROP TABLE blog_videos_blogs');
        $this->addSql('DROP TABLE blog_images_blogs');
        $this->addSql('DROP TABLE blog_themes_blogs');
        $this->addSql('DROP TABLE horaires_apports');
        $this->addSql('DROP TABLE horaires_magasin');
        $this->addSql('DROP TABLE images_blogs');
        $this->addSql('DROP TABLE localisation_sites');
        $this->addSql('DROP TABLE organigramme');
        $this->addSql('DROP TABLE role_organigramme');
        $this->addSql('DROP TABLE sites_iddees');
        $this->addSql('DROP TABLE sources');
        $this->addSql('DROP TABLE themes_blogs');
        $this->addSql('DROP TABLE videos_blogs');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
