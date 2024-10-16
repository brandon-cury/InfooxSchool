<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241016191354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bord (id INT AUTO_INCREMENT NOT NULL, editor_id INT NOT NULL, collection_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, keyword VARCHAR(255) DEFAULT NULL, is_online_access TINYINT(1) NOT NULL, all_user BIGINT NOT NULL, star INT NOT NULL, price BIGINT DEFAULT NULL, whatsapp_number BIGINT DEFAULT NULL, path VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, all_gain_bord BIGINT NOT NULL, all_gain_infooxschool BIGINT NOT NULL, last_update_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_onligne TINYINT(1) NOT NULL, INDEX IDX_A436D2BC6995AC4C (editor_id), INDEX IDX_A436D2BC514956FD (collection_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE collection_bord (id INT AUTO_INCREMENT NOT NULL, editor_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_EE41FE526995AC4C (editor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bord ADD CONSTRAINT FK_A436D2BC6995AC4C FOREIGN KEY (editor_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bord ADD CONSTRAINT FK_A436D2BC514956FD FOREIGN KEY (collection_id) REFERENCES collection_bord (id)');
        $this->addSql('ALTER TABLE collection_bord ADD CONSTRAINT FK_EE41FE526995AC4C FOREIGN KEY (editor_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bord DROP FOREIGN KEY FK_A436D2BC6995AC4C');
        $this->addSql('ALTER TABLE bord DROP FOREIGN KEY FK_A436D2BC514956FD');
        $this->addSql('ALTER TABLE collection_bord DROP FOREIGN KEY FK_EE41FE526995AC4C');
        $this->addSql('DROP TABLE bord');
        $this->addSql('DROP TABLE collection_bord');
    }
}
