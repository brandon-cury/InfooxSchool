<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241017175148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_bord (id INT AUTO_INCREMENT NOT NULL, bord_id INT NOT NULL, user_id INT NOT NULL, recorded_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_DEB79E75D6B1F0E4 (bord_id), INDEX IDX_DEB79E75A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_bord ADD CONSTRAINT FK_DEB79E75D6B1F0E4 FOREIGN KEY (bord_id) REFERENCES bord (id)');
        $this->addSql('ALTER TABLE user_bord ADD CONSTRAINT FK_DEB79E75A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_bord DROP FOREIGN KEY FK_DEB79E75D6B1F0E4');
        $this->addSql('ALTER TABLE user_bord DROP FOREIGN KEY FK_DEB79E75A76ED395');
        $this->addSql('DROP TABLE user_bord');
    }
}
