<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200508135412 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE documents (id INT AUTO_INCREMENT NOT NULL, logoment_id INT NOT NULL, etatdeslieux INT NOT NULL, bail INT NOT NULL, quitance INT NOT NULL, INDEX IDX_A2B07288C96BE59D (logoment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gestion (id INT AUTO_INCREMENT NOT NULL, logement_id INT NOT NULL, incident INT NOT NULL, travaux INT NOT NULL, intervention INT NOT NULL, signalement INT NOT NULL, INDEX IDX_DE0255B058ABF955 (logement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE logement (id INT AUTO_INCREMENT NOT NULL, locataire_id INT NOT NULL, proprietaire_id INT NOT NULL, adresse VARCHAR(255) NOT NULL, surface INT NOT NULL, nbrdepiece INT NOT NULL, datedentrer DATE NOT NULL, datedesortie DATE NOT NULL, loyer NUMERIC(10, 2) NOT NULL, INDEX IDX_F0FD4457D8A38199 (locataire_id), INDEX IDX_F0FD445776C50E4A (proprietaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messagerie (id INT AUTO_INCREMENT NOT NULL, locataire_id INT NOT NULL, proprietaire_id INT NOT NULL, message VARCHAR(255) NOT NULL, INDEX IDX_14E8F60CD8A38199 (locataire_id), INDEX IDX_14E8F60C76C50E4A (proprietaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, motdepasse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE documents ADD CONSTRAINT FK_A2B07288C96BE59D FOREIGN KEY (logoment_id) REFERENCES logement (id)');
        $this->addSql('ALTER TABLE gestion ADD CONSTRAINT FK_DE0255B058ABF955 FOREIGN KEY (logement_id) REFERENCES logement (id)');
        $this->addSql('ALTER TABLE logement ADD CONSTRAINT FK_F0FD4457D8A38199 FOREIGN KEY (locataire_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE logement ADD CONSTRAINT FK_F0FD445776C50E4A FOREIGN KEY (proprietaire_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT FK_14E8F60CD8A38199 FOREIGN KEY (locataire_id) REFERENCES logement (id)');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT FK_14E8F60C76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES logement (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE documents DROP FOREIGN KEY FK_A2B07288C96BE59D');
        $this->addSql('ALTER TABLE gestion DROP FOREIGN KEY FK_DE0255B058ABF955');
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY FK_14E8F60CD8A38199');
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY FK_14E8F60C76C50E4A');
        $this->addSql('ALTER TABLE logement DROP FOREIGN KEY FK_F0FD4457D8A38199');
        $this->addSql('ALTER TABLE logement DROP FOREIGN KEY FK_F0FD445776C50E4A');
        $this->addSql('DROP TABLE documents');
        $this->addSql('DROP TABLE gestion');
        $this->addSql('DROP TABLE logement');
        $this->addSql('DROP TABLE messagerie');
        $this->addSql('DROP TABLE user');
    }
}
