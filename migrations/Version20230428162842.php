<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230428162842 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE program (id INT AUTO_INCREMENT NOT NULL, program_code VARCHAR(255) NOT NULL, program_name VARCHAR(255) NOT NULL, program_duration VARCHAR(255) NOT NULL, program_certification VARCHAR(255) NOT NULL, program_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section (id INT AUTO_INCREMENT NOT NULL, section_code VARCHAR(255) NOT NULL, section_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, student_program_of_study_id INT DEFAULT NULL, student_section_id INT DEFAULT NULL, student_id VARCHAR(255) NOT NULL, student_first_name VARCHAR(255) NOT NULL, student_last_name VARCHAR(255) NOT NULL, student_middle_name VARCHAR(255) NOT NULL, student_nrc VARCHAR(255) NOT NULL, student_email VARCHAR(255) NOT NULL, student_sponsor VARCHAR(255) NOT NULL, student_gender VARCHAR(255) NOT NULL, student_date_of_birth DATETIME NOT NULL, student_disability VARCHAR(255) DEFAULT NULL, INDEX IDX_B723AF3355F86682 (student_program_of_study_id), INDEX IDX_B723AF3335FC0E9B (student_section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF3355F86682 FOREIGN KEY (student_program_of_study_id) REFERENCES program (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF3335FC0E9B FOREIGN KEY (student_section_id) REFERENCES section (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF3355F86682');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF3335FC0E9B');
        $this->addSql('DROP TABLE program');
        $this->addSql('DROP TABLE section');
        $this->addSql('DROP TABLE student');
    }
}
