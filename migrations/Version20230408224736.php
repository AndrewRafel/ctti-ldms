<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230408224736 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE faculty (id INT AUTO_INCREMENT NOT NULL, faculty_id VARCHAR(255) NOT NULL, faculty_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE program (id INT AUTO_INCREMENT NOT NULL, program_code VARCHAR(255) NOT NULL, program_name VARCHAR(255) NOT NULL, program_duration VARCHAR(255) NOT NULL, certification VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, faculty_name_id INT DEFAULT NULL, program_name_id INT DEFAULT NULL, student_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, nrc VARCHAR(13) NOT NULL, email VARCHAR(255) NOT NULL, phone_number VARCHAR(15) NOT NULL, address VARCHAR(255) NOT NULL, sponsor VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, accommodation_status VARCHAR(255) NOT NULL, disability VARCHAR(255) NOT NULL, INDEX IDX_B723AF3330044A8C (faculty_name_id), INDEX IDX_B723AF33FAFD6402 (program_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, user_id VARCHAR(10) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(100) NOT NULL, nrc VARCHAR(13) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF3330044A8C FOREIGN KEY (faculty_name_id) REFERENCES faculty (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33FAFD6402 FOREIGN KEY (program_name_id) REFERENCES program (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF3330044A8C');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33FAFD6402');
        $this->addSql('DROP TABLE faculty');
        $this->addSql('DROP TABLE program');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
