<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201003155615 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place ADD cover_image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CDE5A0E336 FOREIGN KEY (cover_image_id) REFERENCES image (id)');
        $this->addSql('CREATE INDEX IDX_741D53CDE5A0E336 ON place (cover_image_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CDE5A0E336');
        $this->addSql('DROP INDEX IDX_741D53CDE5A0E336 ON place');
        $this->addSql('ALTER TABLE place DROP cover_image_id');
    }
}
