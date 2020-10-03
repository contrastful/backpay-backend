<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201003155458 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE place_image (place_id INT NOT NULL, image_id INT NOT NULL, INDEX IDX_6C4B1F7CDA6A219 (place_id), INDEX IDX_6C4B1F7C3DA5256D (image_id), PRIMARY KEY(place_id, image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE place_image ADD CONSTRAINT FK_6C4B1F7CDA6A219 FOREIGN KEY (place_id) REFERENCES place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_image ADD CONSTRAINT FK_6C4B1F7C3DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FDA6A219');
        $this->addSql('DROP INDEX IDX_C53D045FDA6A219 ON image');
        $this->addSql('ALTER TABLE image DROP place_id');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CDE5A0E336');
        $this->addSql('DROP INDEX IDX_741D53CDE5A0E336 ON place');
        $this->addSql('ALTER TABLE place DROP cover_image_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE place_image');
        $this->addSql('ALTER TABLE image ADD place_id INT NOT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FDA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('CREATE INDEX IDX_C53D045FDA6A219 ON image (place_id)');
        $this->addSql('ALTER TABLE place ADD cover_image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CDE5A0E336 FOREIGN KEY (cover_image_id) REFERENCES image (id)');
        $this->addSql('CREATE INDEX IDX_741D53CDE5A0E336 ON place (cover_image_id)');
    }
}
