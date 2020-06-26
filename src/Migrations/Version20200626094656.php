<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200626094656 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D700047D2');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('DROP INDEX UNIQ_6EEAA67D700047D2 ON commande');
        $this->addSql('ALTER TABLE commande DROP ticket_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, num INT NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE commande ADD ticket_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D700047D2 FOREIGN KEY (ticket_id) REFERENCES ticket (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6EEAA67D700047D2 ON commande (ticket_id)');
    }
}
