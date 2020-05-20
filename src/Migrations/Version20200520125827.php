<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200520125827 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, housing_id INT DEFAULT NULL, label VARCHAR(255) NOT NULL, INDEX IDX_64C19C1AD5873E3 (housing_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, housing_id INT DEFAULT NULL, fichier VARCHAR(255) NOT NULL, INDEX IDX_D8698A76AD5873E3 (housing_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE housing (id INT AUTO_INCREMENT NOT NULL, locataire_id INT DEFAULT NULL, proprietaire_id INT DEFAULT NULL, adress VARCHAR(255) NOT NULL, surface NUMERIC(10, 0) NOT NULL, piece INT NOT NULL, date_enter DATE NOT NULL, date_exit DATE NOT NULL, owner VARCHAR(255) NOT NULL, rent NUMERIC(10, 2) NOT NULL, INDEX IDX_FB8142C3D8A38199 (locataire_id), INDEX IDX_FB8142C376C50E4A (proprietaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, housing_id INT DEFAULT NULL, user_id INT DEFAULT NULL, text LONGTEXT NOT NULL, INDEX IDX_B6BD307FAD5873E3 (housing_id), INDEX IDX_B6BD307FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, fist_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1AD5873E3 FOREIGN KEY (housing_id) REFERENCES housing (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76AD5873E3 FOREIGN KEY (housing_id) REFERENCES housing (id)');
        $this->addSql('ALTER TABLE housing ADD CONSTRAINT FK_FB8142C3D8A38199 FOREIGN KEY (locataire_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE housing ADD CONSTRAINT FK_FB8142C376C50E4A FOREIGN KEY (proprietaire_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FAD5873E3 FOREIGN KEY (housing_id) REFERENCES housing (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1AD5873E3');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76AD5873E3');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FAD5873E3');
        $this->addSql('ALTER TABLE housing DROP FOREIGN KEY FK_FB8142C3D8A38199');
        $this->addSql('ALTER TABLE housing DROP FOREIGN KEY FK_FB8142C376C50E4A');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FA76ED395');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE housing');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE user');
    }
}
