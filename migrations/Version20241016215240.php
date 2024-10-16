<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241016215240 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bord (id INT AUTO_INCREMENT NOT NULL, editor_id INT NOT NULL, collection_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, keyword VARCHAR(255) DEFAULT NULL, is_online_access TINYINT(1) NOT NULL, all_user BIGINT NOT NULL, star INT NOT NULL, price BIGINT DEFAULT NULL, whatsapp_number BIGINT DEFAULT NULL, path VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, all_gain_bord BIGINT NOT NULL, all_gain_infooxschool BIGINT NOT NULL, last_update_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_onligne TINYINT(1) NOT NULL, INDEX IDX_A436D2BC6995AC4C (editor_id), INDEX IDX_A436D2BC514956FD (collection_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, all_user BIGINT NOT NULL, sort INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe_filiere (classe_id INT NOT NULL, filiere_id INT NOT NULL, INDEX IDX_55493DFF8F5EA509 (classe_id), INDEX IDX_55493DFF180AA129 (filiere_id), PRIMARY KEY(classe_id, filiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE collection_bord (id INT AUTO_INCREMENT NOT NULL, editor_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_EE41FE526995AC4C (editor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filiere (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, sort INT NOT NULL, all_user BIGINT NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filiere_section (filiere_id INT NOT NULL, section_id INT NOT NULL, INDEX IDX_4DFC386C180AA129 (filiere_id), INDEX IDX_4DFC386CD823E37A (section_id), PRIMARY KEY(filiere_id, section_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, all_user BIGINT NOT NULL, sort INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere_classe (matiere_id INT NOT NULL, classe_id INT NOT NULL, INDEX IDX_AF649A8BF46CD258 (matiere_id), INDEX IDX_AF649A8B8F5EA509 (classe_id), PRIMARY KEY(matiere_id, classe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, sort INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, user_affiliate_id INT DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_verified_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', password VARCHAR(255) NOT NULL, tel BIGINT DEFAULT NULL, code_tel BIGINT DEFAULT NULL, number_affiliated INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', image VARCHAR(255) DEFAULT NULL, INDEX IDX_8D93D649D60322AC (role_id), INDEX IDX_8D93D6491FDEB898 (user_affiliate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bord ADD CONSTRAINT FK_A436D2BC6995AC4C FOREIGN KEY (editor_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bord ADD CONSTRAINT FK_A436D2BC514956FD FOREIGN KEY (collection_id) REFERENCES collection_bord (id)');
        $this->addSql('ALTER TABLE classe_filiere ADD CONSTRAINT FK_55493DFF8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe_filiere ADD CONSTRAINT FK_55493DFF180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE collection_bord ADD CONSTRAINT FK_EE41FE526995AC4C FOREIGN KEY (editor_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE filiere_section ADD CONSTRAINT FK_4DFC386C180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE filiere_section ADD CONSTRAINT FK_4DFC386CD823E37A FOREIGN KEY (section_id) REFERENCES section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matiere_classe ADD CONSTRAINT FK_AF649A8BF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matiere_classe ADD CONSTRAINT FK_AF649A8B8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6491FDEB898 FOREIGN KEY (user_affiliate_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bord DROP FOREIGN KEY FK_A436D2BC6995AC4C');
        $this->addSql('ALTER TABLE bord DROP FOREIGN KEY FK_A436D2BC514956FD');
        $this->addSql('ALTER TABLE classe_filiere DROP FOREIGN KEY FK_55493DFF8F5EA509');
        $this->addSql('ALTER TABLE classe_filiere DROP FOREIGN KEY FK_55493DFF180AA129');
        $this->addSql('ALTER TABLE collection_bord DROP FOREIGN KEY FK_EE41FE526995AC4C');
        $this->addSql('ALTER TABLE filiere_section DROP FOREIGN KEY FK_4DFC386C180AA129');
        $this->addSql('ALTER TABLE filiere_section DROP FOREIGN KEY FK_4DFC386CD823E37A');
        $this->addSql('ALTER TABLE matiere_classe DROP FOREIGN KEY FK_AF649A8BF46CD258');
        $this->addSql('ALTER TABLE matiere_classe DROP FOREIGN KEY FK_AF649A8B8F5EA509');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6491FDEB898');
        $this->addSql('DROP TABLE bord');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE classe_filiere');
        $this->addSql('DROP TABLE collection_bord');
        $this->addSql('DROP TABLE filiere');
        $this->addSql('DROP TABLE filiere_section');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE matiere_classe');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE section');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
