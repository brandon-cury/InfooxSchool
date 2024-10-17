<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241017110836 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercice ADD content VARCHAR(255) DEFAULT NULL, ADD corrected VARCHAR(255) DEFAULT NULL, ADD video_link VARCHAR(255) DEFAULT NULL, ADD video_img VARCHAR(255) DEFAULT NULL, ADD is_youtube TINYINT(1) NOT NULL, ADD sort INT NOT NULL, ADD is_container TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercice DROP content, DROP corrected, DROP video_link, DROP video_img, DROP is_youtube, DROP sort, DROP is_container');
    }
}
