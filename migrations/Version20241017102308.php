<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241017102308 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE epreuve (id INT AUTO_INCREMENT NOT NULL, editor_id INT NOT NULL, bord_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, all_user BIGINT NOT NULL, content VARCHAR(255) DEFAULT NULL, corrected VARCHAR(255) DEFAULT NULL, video_link VARCHAR(255) DEFAULT NULL, video_img VARCHAR(255) DEFAULT NULL, is_youtube TINYINT(1) NOT NULL, image VARCHAR(255) DEFAULT NULL, sort INT NOT NULL, path VARCHAR(255) DEFAULT NULL, star INT NOT NULL, update_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_container TINYINT(1) NOT NULL, is_onligne TINYINT(1) NOT NULL, INDEX IDX_D6ADE47F6995AC4C (editor_id), INDEX IDX_D6ADE47FD6B1F0E4 (bord_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE epreuve_section (epreuve_id INT NOT NULL, section_id INT NOT NULL, INDEX IDX_78931263AB990336 (epreuve_id), INDEX IDX_78931263D823E37A (section_id), PRIMARY KEY(epreuve_id, section_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE epreuve_filiere (epreuve_id INT NOT NULL, filiere_id INT NOT NULL, INDEX IDX_7B303512AB990336 (epreuve_id), INDEX IDX_7B303512180AA129 (filiere_id), PRIMARY KEY(epreuve_id, filiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE epreuve_classe (epreuve_id INT NOT NULL, classe_id INT NOT NULL, INDEX IDX_6AC91C21AB990336 (epreuve_id), INDEX IDX_6AC91C218F5EA509 (classe_id), PRIMARY KEY(epreuve_id, classe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE epreuve_matiere (epreuve_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_C5F43FC6AB990336 (epreuve_id), INDEX IDX_C5F43FC6F46CD258 (matiere_id), PRIMARY KEY(epreuve_id, matiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE epreuve ADD CONSTRAINT FK_D6ADE47F6995AC4C FOREIGN KEY (editor_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE epreuve ADD CONSTRAINT FK_D6ADE47FD6B1F0E4 FOREIGN KEY (bord_id) REFERENCES bord (id)');
        $this->addSql('ALTER TABLE epreuve_section ADD CONSTRAINT FK_78931263AB990336 FOREIGN KEY (epreuve_id) REFERENCES epreuve (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE epreuve_section ADD CONSTRAINT FK_78931263D823E37A FOREIGN KEY (section_id) REFERENCES section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE epreuve_filiere ADD CONSTRAINT FK_7B303512AB990336 FOREIGN KEY (epreuve_id) REFERENCES epreuve (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE epreuve_filiere ADD CONSTRAINT FK_7B303512180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE epreuve_classe ADD CONSTRAINT FK_6AC91C21AB990336 FOREIGN KEY (epreuve_id) REFERENCES epreuve (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE epreuve_classe ADD CONSTRAINT FK_6AC91C218F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE epreuve_matiere ADD CONSTRAINT FK_C5F43FC6AB990336 FOREIGN KEY (epreuve_id) REFERENCES epreuve (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE epreuve_matiere ADD CONSTRAINT FK_C5F43FC6F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE epreuve DROP FOREIGN KEY FK_D6ADE47F6995AC4C');
        $this->addSql('ALTER TABLE epreuve DROP FOREIGN KEY FK_D6ADE47FD6B1F0E4');
        $this->addSql('ALTER TABLE epreuve_section DROP FOREIGN KEY FK_78931263AB990336');
        $this->addSql('ALTER TABLE epreuve_section DROP FOREIGN KEY FK_78931263D823E37A');
        $this->addSql('ALTER TABLE epreuve_filiere DROP FOREIGN KEY FK_7B303512AB990336');
        $this->addSql('ALTER TABLE epreuve_filiere DROP FOREIGN KEY FK_7B303512180AA129');
        $this->addSql('ALTER TABLE epreuve_classe DROP FOREIGN KEY FK_6AC91C21AB990336');
        $this->addSql('ALTER TABLE epreuve_classe DROP FOREIGN KEY FK_6AC91C218F5EA509');
        $this->addSql('ALTER TABLE epreuve_matiere DROP FOREIGN KEY FK_C5F43FC6AB990336');
        $this->addSql('ALTER TABLE epreuve_matiere DROP FOREIGN KEY FK_C5F43FC6F46CD258');
        $this->addSql('DROP TABLE epreuve');
        $this->addSql('DROP TABLE epreuve_section');
        $this->addSql('DROP TABLE epreuve_filiere');
        $this->addSql('DROP TABLE epreuve_classe');
        $this->addSql('DROP TABLE epreuve_matiere');
    }
}
