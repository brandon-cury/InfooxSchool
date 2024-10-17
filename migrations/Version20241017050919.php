<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241017050919 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, bord_id INT NOT NULL, name VARCHAR(255) NOT NULL, content VARCHAR(255) DEFAULT NULL, video_link VARCHAR(255) DEFAULT NULL, video_img VARCHAR(255) DEFAULT NULL, youtube TINYINT(1) NOT NULL, sort INT NOT NULL, is_container TINYINT(1) NOT NULL, INDEX IDX_FDCA8C9CD6B1F0E4 (bord_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, transaction_id BIGINT NOT NULL, status TINYINT(1) NOT NULL, numb INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CD6B1F0E4 FOREIGN KEY (bord_id) REFERENCES bord (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CD6B1F0E4');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE `order`');
    }
}
