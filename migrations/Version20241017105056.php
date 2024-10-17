<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241017105056 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe CHANGE name title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE collection_bord CHANGE name title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE cour CHANGE name title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE epreuve CHANGE name title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE exercice ADD cour_id INT DEFAULT NULL, ADD title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE exercice ADD CONSTRAINT FK_E418C74DB7942F03 FOREIGN KEY (cour_id) REFERENCES cour (id)');
        $this->addSql('CREATE INDEX IDX_E418C74DB7942F03 ON exercice (cour_id)');
        $this->addSql('ALTER TABLE filiere CHANGE name title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE matiere CHANGE name title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE role CHANGE name title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE section CHANGE name title VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe CHANGE title name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE collection_bord CHANGE title name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE cour CHANGE title name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE epreuve CHANGE title name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE exercice DROP FOREIGN KEY FK_E418C74DB7942F03');
        $this->addSql('DROP INDEX IDX_E418C74DB7942F03 ON exercice');
        $this->addSql('ALTER TABLE exercice DROP cour_id, DROP title');
        $this->addSql('ALTER TABLE filiere CHANGE title name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE matiere CHANGE title name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE role CHANGE title name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE section CHANGE title name VARCHAR(255) NOT NULL');
    }
}
