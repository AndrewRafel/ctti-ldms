<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230502002545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, event_name VARCHAR(255) NOT NULL, event_start DATE NOT NULL, event_end DATE NOT NULL, event_location VARCHAR(255) NOT NULL, event_host VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staff (id INT AUTO_INCREMENT NOT NULL, staff_faculty_id INT DEFAULT NULL, staff_program_id INT DEFAULT NULL, staff_id VARCHAR(255) NOT NULL, staff_first_name VARCHAR(255) NOT NULL, staff_middle_name VARCHAR(255) NOT NULL, staff_last_name VARCHAR(255) NOT NULL, staff_email VARCHAR(255) NOT NULL, staff_nrc VARCHAR(255) NOT NULL, staff_designation VARCHAR(255) NOT NULL, staff_contact VARCHAR(255) NOT NULL, INDEX IDX_426EF3928E5EBBB9 (staff_faculty_id), INDEX IDX_426EF392D8EA17DB (staff_program_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE staff ADD CONSTRAINT FK_426EF3928E5EBBB9 FOREIGN KEY (staff_faculty_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE staff ADD CONSTRAINT FK_426EF392D8EA17DB FOREIGN KEY (staff_program_id) REFERENCES program (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE staff DROP FOREIGN KEY FK_426EF3928E5EBBB9');
        $this->addSql('ALTER TABLE staff DROP FOREIGN KEY FK_426EF392D8EA17DB');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE staff');
    }
}
