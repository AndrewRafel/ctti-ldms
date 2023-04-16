<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230414140329 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE faculty ADD program_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE faculty ADD CONSTRAINT FK_179660433EB8070A FOREIGN KEY (program_id) REFERENCES program (id)');
        $this->addSql('CREATE INDEX IDX_179660433EB8070A ON faculty (program_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE faculty DROP FOREIGN KEY FK_179660433EB8070A');
        $this->addSql('DROP INDEX IDX_179660433EB8070A ON faculty');
        $this->addSql('ALTER TABLE faculty DROP program_id');
    }
}
