<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201001175252 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, place_id INT NOT NULL, source VARCHAR(255) NOT NULL, label VARCHAR(255) NOT NULL, INDEX IDX_C53D045FDA6A219 (place_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE perk (id INT AUTO_INCREMENT NOT NULL, icon VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place_perk (place_id INT NOT NULL, perk_id INT NOT NULL, INDEX IDX_9BBA503DA6A219 (place_id), INDEX IDX_9BBA503DF084E33 (perk_id), PRIMARY KEY(place_id, perk_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FDA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE place_perk ADD CONSTRAINT FK_9BBA503DA6A219 FOREIGN KEY (place_id) REFERENCES place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_perk ADD CONSTRAINT FK_9BBA503DF084E33 FOREIGN KEY (perk_id) REFERENCES perk (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place_perk DROP FOREIGN KEY FK_9BBA503DF084E33');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE perk');
        $this->addSql('DROP TABLE place_perk');
    }
}
