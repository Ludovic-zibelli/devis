<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190924204135 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, raison_social VARCHAR(255) NOT NULL, type_societe LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, numero_telephone INT NOT NULL, email VARCHAR(255) NOT NULL, newletter TINYINT(1) NOT NULL, rgpd TINYINT(1) NOT NULL, remarque LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE email (id INT AUTO_INCREMENT NOT NULL, id_client_id INT DEFAULT NULL, date DATETIME NOT NULL, adresse_mail VARCHAR(255) NOT NULL, sujet VARCHAR(255) NOT NULL, corp LONGTEXT NOT NULL, pieces_jointe VARCHAR(255) NOT NULL, INDEX IDX_E7927C7499DED506 (id_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rdv (id INT AUTO_INCREMENT NOT NULL, id_client_id INT DEFAULT NULL, date_rdv DATETIME NOT NULL, interlocuteur VARCHAR(255) NOT NULL, note_rdv LONGTEXT NOT NULL, INDEX IDX_10C31F8699DED506 (id_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE email ADD CONSTRAINT FK_E7927C7499DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8699DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE email DROP FOREIGN KEY FK_E7927C7499DED506');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8699DED506');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE email');
        $this->addSql('DROP TABLE rdv');
    }
}
