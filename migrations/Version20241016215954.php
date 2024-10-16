<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241016215954 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bord_section (bord_id INT NOT NULL, section_id INT NOT NULL, INDEX IDX_B3BA97F0D6B1F0E4 (bord_id), INDEX IDX_B3BA97F0D823E37A (section_id), PRIMARY KEY(bord_id, section_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bord_filiere (bord_id INT NOT NULL, filiere_id INT NOT NULL, INDEX IDX_B019B081D6B1F0E4 (bord_id), INDEX IDX_B019B081180AA129 (filiere_id), PRIMARY KEY(bord_id, filiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bord_classe (bord_id INT NOT NULL, classe_id INT NOT NULL, INDEX IDX_22FF0391D6B1F0E4 (bord_id), INDEX IDX_22FF03918F5EA509 (classe_id), PRIMARY KEY(bord_id, classe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bord_matiere (bord_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_EDDBA55D6B1F0E4 (bord_id), INDEX IDX_EDDBA55F46CD258 (matiere_id), PRIMARY KEY(bord_id, matiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bord_section ADD CONSTRAINT FK_B3BA97F0D6B1F0E4 FOREIGN KEY (bord_id) REFERENCES bord (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bord_section ADD CONSTRAINT FK_B3BA97F0D823E37A FOREIGN KEY (section_id) REFERENCES section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bord_filiere ADD CONSTRAINT FK_B019B081D6B1F0E4 FOREIGN KEY (bord_id) REFERENCES bord (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bord_filiere ADD CONSTRAINT FK_B019B081180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bord_classe ADD CONSTRAINT FK_22FF0391D6B1F0E4 FOREIGN KEY (bord_id) REFERENCES bord (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bord_classe ADD CONSTRAINT FK_22FF03918F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bord_matiere ADD CONSTRAINT FK_EDDBA55D6B1F0E4 FOREIGN KEY (bord_id) REFERENCES bord (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bord_matiere ADD CONSTRAINT FK_EDDBA55F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bord_section DROP FOREIGN KEY FK_B3BA97F0D6B1F0E4');
        $this->addSql('ALTER TABLE bord_section DROP FOREIGN KEY FK_B3BA97F0D823E37A');
        $this->addSql('ALTER TABLE bord_filiere DROP FOREIGN KEY FK_B019B081D6B1F0E4');
        $this->addSql('ALTER TABLE bord_filiere DROP FOREIGN KEY FK_B019B081180AA129');
        $this->addSql('ALTER TABLE bord_classe DROP FOREIGN KEY FK_22FF0391D6B1F0E4');
        $this->addSql('ALTER TABLE bord_classe DROP FOREIGN KEY FK_22FF03918F5EA509');
        $this->addSql('ALTER TABLE bord_matiere DROP FOREIGN KEY FK_EDDBA55D6B1F0E4');
        $this->addSql('ALTER TABLE bord_matiere DROP FOREIGN KEY FK_EDDBA55F46CD258');
        $this->addSql('DROP TABLE bord_section');
        $this->addSql('DROP TABLE bord_filiere');
        $this->addSql('DROP TABLE bord_classe');
        $this->addSql('DROP TABLE bord_matiere');
    }
}
