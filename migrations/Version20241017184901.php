<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241017184901 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, bord_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', sort INT NOT NULL, INDEX IDX_C53D045FD6B1F0E4 (bord_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE money_withdrawal (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, total BIGINT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_429E70A5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE slider (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, link VARCHAR(255) DEFAULT NULL, recorded_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', sort INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FD6B1F0E4 FOREIGN KEY (bord_id) REFERENCES bord (id)');
        $this->addSql('ALTER TABLE money_withdrawal ADD CONSTRAINT FK_429E70A5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FD6B1F0E4');
        $this->addSql('ALTER TABLE money_withdrawal DROP FOREIGN KEY FK_429E70A5A76ED395');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE money_withdrawal');
        $this->addSql('DROP TABLE slider');
    }
}
