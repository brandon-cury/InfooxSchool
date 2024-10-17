<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241017103841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cour (id INT AUTO_INCREMENT NOT NULL, bord_id INT NOT NULL, name VARCHAR(255) NOT NULL, content VARCHAR(255) DEFAULT NULL, video_link VARCHAR(255) DEFAULT NULL, video_img VARCHAR(255) DEFAULT NULL, is_youtube TINYINT(1) NOT NULL, sort INT NOT NULL, is_container TINYINT(1) NOT NULL, INDEX IDX_A71F964FD6B1F0E4 (bord_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exercice (id INT AUTO_INCREMENT NOT NULL, editor_id INT NOT NULL, INDEX IDX_E418C74D6995AC4C (editor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cour ADD CONSTRAINT FK_A71F964FD6B1F0E4 FOREIGN KEY (bord_id) REFERENCES bord (id)');
        $this->addSql('ALTER TABLE exercice ADD CONSTRAINT FK_E418C74D6995AC4C FOREIGN KEY (editor_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CD6B1F0E4');
        $this->addSql('DROP TABLE cours');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, bord_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, content VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, video_link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, video_img VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, is_youtube TINYINT(1) NOT NULL, sort INT NOT NULL, is_container TINYINT(1) NOT NULL, INDEX IDX_FDCA8C9CD6B1F0E4 (bord_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CD6B1F0E4 FOREIGN KEY (bord_id) REFERENCES bord (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE cour DROP FOREIGN KEY FK_A71F964FD6B1F0E4');
        $this->addSql('ALTER TABLE exercice DROP FOREIGN KEY FK_E418C74D6995AC4C');
        $this->addSql('DROP TABLE cour');
        $this->addSql('DROP TABLE exercice');
    }
}
