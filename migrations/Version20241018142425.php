<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241018142425 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bord (id INT AUTO_INCREMENT NOT NULL, editor_id INT NOT NULL, collection_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, keyword VARCHAR(255) DEFAULT NULL, is_online_access TINYINT(1) NOT NULL, all_user BIGINT NOT NULL, star INT NOT NULL, price BIGINT DEFAULT NULL, whatsapp_number BIGINT DEFAULT NULL, path VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, all_gain_bord BIGINT NOT NULL, all_gain_infooxschool BIGINT NOT NULL, last_update_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_onligne TINYINT(1) NOT NULL, INDEX IDX_A436D2BC6995AC4C (editor_id), INDEX IDX_A436D2BC514956FD (collection_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bord_section (bord_id INT NOT NULL, section_id INT NOT NULL, INDEX IDX_B3BA97F0D6B1F0E4 (bord_id), INDEX IDX_B3BA97F0D823E37A (section_id), PRIMARY KEY(bord_id, section_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bord_filiere (bord_id INT NOT NULL, filiere_id INT NOT NULL, INDEX IDX_B019B081D6B1F0E4 (bord_id), INDEX IDX_B019B081180AA129 (filiere_id), PRIMARY KEY(bord_id, filiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bord_classe (bord_id INT NOT NULL, classe_id INT NOT NULL, INDEX IDX_22FF0391D6B1F0E4 (bord_id), INDEX IDX_22FF03918F5EA509 (classe_id), PRIMARY KEY(bord_id, classe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bord_matiere (bord_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_EDDBA55D6B1F0E4 (bord_id), INDEX IDX_EDDBA55F46CD258 (matiere_id), PRIMARY KEY(bord_id, matiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, all_user BIGINT NOT NULL, sort INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe_filiere (classe_id INT NOT NULL, filiere_id INT NOT NULL, INDEX IDX_55493DFF8F5EA509 (classe_id), INDEX IDX_55493DFF180AA129 (filiere_id), PRIMARY KEY(classe_id, filiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE collection_bord (id INT AUTO_INCREMENT NOT NULL, editor_id INT NOT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_EE41FE526995AC4C (editor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cour (id INT AUTO_INCREMENT NOT NULL, bord_id INT NOT NULL, title VARCHAR(255) NOT NULL, content VARCHAR(255) DEFAULT NULL, video_link VARCHAR(255) DEFAULT NULL, video_img VARCHAR(255) DEFAULT NULL, is_youtube TINYINT(1) NOT NULL, sort INT NOT NULL, is_container TINYINT(1) NOT NULL, INDEX IDX_A71F964FD6B1F0E4 (bord_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE epreuve (id INT AUTO_INCREMENT NOT NULL, editor_id INT NOT NULL, bord_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, all_user BIGINT NOT NULL, content VARCHAR(255) DEFAULT NULL, corrected VARCHAR(255) DEFAULT NULL, video_link VARCHAR(255) DEFAULT NULL, video_img VARCHAR(255) DEFAULT NULL, is_youtube TINYINT(1) NOT NULL, image VARCHAR(255) DEFAULT NULL, sort INT NOT NULL, path VARCHAR(255) DEFAULT NULL, star INT NOT NULL, update_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_container TINYINT(1) NOT NULL, is_onligne TINYINT(1) NOT NULL, INDEX IDX_D6ADE47F6995AC4C (editor_id), INDEX IDX_D6ADE47FD6B1F0E4 (bord_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE epreuve_section (epreuve_id INT NOT NULL, section_id INT NOT NULL, INDEX IDX_78931263AB990336 (epreuve_id), INDEX IDX_78931263D823E37A (section_id), PRIMARY KEY(epreuve_id, section_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE epreuve_filiere (epreuve_id INT NOT NULL, filiere_id INT NOT NULL, INDEX IDX_7B303512AB990336 (epreuve_id), INDEX IDX_7B303512180AA129 (filiere_id), PRIMARY KEY(epreuve_id, filiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE epreuve_classe (epreuve_id INT NOT NULL, classe_id INT NOT NULL, INDEX IDX_6AC91C21AB990336 (epreuve_id), INDEX IDX_6AC91C218F5EA509 (classe_id), PRIMARY KEY(epreuve_id, classe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE epreuve_matiere (epreuve_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_C5F43FC6AB990336 (epreuve_id), INDEX IDX_C5F43FC6F46CD258 (matiere_id), PRIMARY KEY(epreuve_id, matiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exercice (id INT AUTO_INCREMENT NOT NULL, editor_id INT NOT NULL, cour_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, content VARCHAR(255) DEFAULT NULL, corrected VARCHAR(255) DEFAULT NULL, video_link VARCHAR(255) DEFAULT NULL, video_img VARCHAR(255) DEFAULT NULL, is_youtube TINYINT(1) NOT NULL, sort INT NOT NULL, is_container TINYINT(1) NOT NULL, INDEX IDX_E418C74D6995AC4C (editor_id), INDEX IDX_E418C74DB7942F03 (cour_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filiere (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, sort INT NOT NULL, all_user BIGINT NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filiere_section (filiere_id INT NOT NULL, section_id INT NOT NULL, INDEX IDX_4DFC386C180AA129 (filiere_id), INDEX IDX_4DFC386CD823E37A (section_id), PRIMARY KEY(filiere_id, section_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, bord_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', sort INT NOT NULL, INDEX IDX_C53D045FD6B1F0E4 (bord_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, all_user BIGINT NOT NULL, sort INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere_classe (matiere_id INT NOT NULL, classe_id INT NOT NULL, INDEX IDX_AF649A8BF46CD258 (matiere_id), INDEX IDX_AF649A8B8F5EA509 (classe_id), PRIMARY KEY(matiere_id, classe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE money_withdrawal (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, total BIGINT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_429E70A5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, transaction_id BIGINT NOT NULL, status TINYINT(1) NOT NULL, numb INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, sort INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE slider (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, link VARCHAR(255) DEFAULT NULL, recorded_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', sort INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, user_affiliate_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email_verified_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', tel BIGINT DEFAULT NULL, code_tel BIGINT DEFAULT NULL, number_affiliated INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', avatar VARCHAR(255) DEFAULT NULL, INDEX IDX_8D93D6491FDEB898 (user_affiliate_id), UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_bord (id INT AUTO_INCREMENT NOT NULL, bord_id INT NOT NULL, user_id INT NOT NULL, recorded_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_DEB79E75D6B1F0E4 (bord_id), INDEX IDX_DEB79E75A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bord ADD CONSTRAINT FK_A436D2BC6995AC4C FOREIGN KEY (editor_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bord ADD CONSTRAINT FK_A436D2BC514956FD FOREIGN KEY (collection_id) REFERENCES collection_bord (id)');
        $this->addSql('ALTER TABLE bord_section ADD CONSTRAINT FK_B3BA97F0D6B1F0E4 FOREIGN KEY (bord_id) REFERENCES bord (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bord_section ADD CONSTRAINT FK_B3BA97F0D823E37A FOREIGN KEY (section_id) REFERENCES section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bord_filiere ADD CONSTRAINT FK_B019B081D6B1F0E4 FOREIGN KEY (bord_id) REFERENCES bord (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bord_filiere ADD CONSTRAINT FK_B019B081180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bord_classe ADD CONSTRAINT FK_22FF0391D6B1F0E4 FOREIGN KEY (bord_id) REFERENCES bord (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bord_classe ADD CONSTRAINT FK_22FF03918F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bord_matiere ADD CONSTRAINT FK_EDDBA55D6B1F0E4 FOREIGN KEY (bord_id) REFERENCES bord (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bord_matiere ADD CONSTRAINT FK_EDDBA55F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe_filiere ADD CONSTRAINT FK_55493DFF8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe_filiere ADD CONSTRAINT FK_55493DFF180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE collection_bord ADD CONSTRAINT FK_EE41FE526995AC4C FOREIGN KEY (editor_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cour ADD CONSTRAINT FK_A71F964FD6B1F0E4 FOREIGN KEY (bord_id) REFERENCES bord (id)');
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
        $this->addSql('ALTER TABLE exercice ADD CONSTRAINT FK_E418C74D6995AC4C FOREIGN KEY (editor_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE exercice ADD CONSTRAINT FK_E418C74DB7942F03 FOREIGN KEY (cour_id) REFERENCES cour (id)');
        $this->addSql('ALTER TABLE filiere_section ADD CONSTRAINT FK_4DFC386C180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE filiere_section ADD CONSTRAINT FK_4DFC386CD823E37A FOREIGN KEY (section_id) REFERENCES section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FD6B1F0E4 FOREIGN KEY (bord_id) REFERENCES bord (id)');
        $this->addSql('ALTER TABLE matiere_classe ADD CONSTRAINT FK_AF649A8BF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matiere_classe ADD CONSTRAINT FK_AF649A8B8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE money_withdrawal ADD CONSTRAINT FK_429E70A5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6491FDEB898 FOREIGN KEY (user_affiliate_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_bord ADD CONSTRAINT FK_DEB79E75D6B1F0E4 FOREIGN KEY (bord_id) REFERENCES bord (id)');
        $this->addSql('ALTER TABLE user_bord ADD CONSTRAINT FK_DEB79E75A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bord DROP FOREIGN KEY FK_A436D2BC6995AC4C');
        $this->addSql('ALTER TABLE bord DROP FOREIGN KEY FK_A436D2BC514956FD');
        $this->addSql('ALTER TABLE bord_section DROP FOREIGN KEY FK_B3BA97F0D6B1F0E4');
        $this->addSql('ALTER TABLE bord_section DROP FOREIGN KEY FK_B3BA97F0D823E37A');
        $this->addSql('ALTER TABLE bord_filiere DROP FOREIGN KEY FK_B019B081D6B1F0E4');
        $this->addSql('ALTER TABLE bord_filiere DROP FOREIGN KEY FK_B019B081180AA129');
        $this->addSql('ALTER TABLE bord_classe DROP FOREIGN KEY FK_22FF0391D6B1F0E4');
        $this->addSql('ALTER TABLE bord_classe DROP FOREIGN KEY FK_22FF03918F5EA509');
        $this->addSql('ALTER TABLE bord_matiere DROP FOREIGN KEY FK_EDDBA55D6B1F0E4');
        $this->addSql('ALTER TABLE bord_matiere DROP FOREIGN KEY FK_EDDBA55F46CD258');
        $this->addSql('ALTER TABLE classe_filiere DROP FOREIGN KEY FK_55493DFF8F5EA509');
        $this->addSql('ALTER TABLE classe_filiere DROP FOREIGN KEY FK_55493DFF180AA129');
        $this->addSql('ALTER TABLE collection_bord DROP FOREIGN KEY FK_EE41FE526995AC4C');
        $this->addSql('ALTER TABLE cour DROP FOREIGN KEY FK_A71F964FD6B1F0E4');
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
        $this->addSql('ALTER TABLE exercice DROP FOREIGN KEY FK_E418C74D6995AC4C');
        $this->addSql('ALTER TABLE exercice DROP FOREIGN KEY FK_E418C74DB7942F03');
        $this->addSql('ALTER TABLE filiere_section DROP FOREIGN KEY FK_4DFC386C180AA129');
        $this->addSql('ALTER TABLE filiere_section DROP FOREIGN KEY FK_4DFC386CD823E37A');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FD6B1F0E4');
        $this->addSql('ALTER TABLE matiere_classe DROP FOREIGN KEY FK_AF649A8BF46CD258');
        $this->addSql('ALTER TABLE matiere_classe DROP FOREIGN KEY FK_AF649A8B8F5EA509');
        $this->addSql('ALTER TABLE money_withdrawal DROP FOREIGN KEY FK_429E70A5A76ED395');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6491FDEB898');
        $this->addSql('ALTER TABLE user_bord DROP FOREIGN KEY FK_DEB79E75D6B1F0E4');
        $this->addSql('ALTER TABLE user_bord DROP FOREIGN KEY FK_DEB79E75A76ED395');
        $this->addSql('DROP TABLE bord');
        $this->addSql('DROP TABLE bord_section');
        $this->addSql('DROP TABLE bord_filiere');
        $this->addSql('DROP TABLE bord_classe');
        $this->addSql('DROP TABLE bord_matiere');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE classe_filiere');
        $this->addSql('DROP TABLE collection_bord');
        $this->addSql('DROP TABLE cour');
        $this->addSql('DROP TABLE epreuve');
        $this->addSql('DROP TABLE epreuve_section');
        $this->addSql('DROP TABLE epreuve_filiere');
        $this->addSql('DROP TABLE epreuve_classe');
        $this->addSql('DROP TABLE epreuve_matiere');
        $this->addSql('DROP TABLE exercice');
        $this->addSql('DROP TABLE filiere');
        $this->addSql('DROP TABLE filiere_section');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE matiere_classe');
        $this->addSql('DROP TABLE money_withdrawal');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE section');
        $this->addSql('DROP TABLE slider');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_bord');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
