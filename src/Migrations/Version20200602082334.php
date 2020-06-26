<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200602082334 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, confirm_password VARCHAR(255) NOT NULL, roles JSON NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, ticket_id INT DEFAULT NULL, num INT NOT NULL, prix DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_6EEAA67D700047D2 (ticket_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, produit_id INT NOT NULL, url VARCHAR(255) NOT NULL, caption VARCHAR(255) NOT NULL, INDEX IDX_C53D045FF347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, famille VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, menu_id INT DEFAULT NULL, ingredient_id INT DEFAULT NULL, commande_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, updated_at DATETIME NOT NULL, filename VARCHAR(255) NOT NULL, INDEX IDX_29A5EC27CCD7E912 (menu_id), INDEX IDX_29A5EC27933FE08C (ingredient_id), INDEX IDX_29A5EC2782EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, num INT NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D700047D2 FOREIGN KEY (ticket_id) REFERENCES ticket (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2782EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2782EA2E54');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27933FE08C');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27CCD7E912');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FF347EFB');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D700047D2');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE ticket');
    }
}
