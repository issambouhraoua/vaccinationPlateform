<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210522214816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vaccination (id INT AUTO_INCREMENT NOT NULL, patient_id INT DEFAULT NULL, vaccin_id INT DEFAULT NULL, centre_vaccination_id INT DEFAULT NULL, statut VARCHAR(255) DEFAULT NULL, date_vaccination DATE NOT NULL, INDEX IDX_1B0999996B899279 (patient_id), INDEX IDX_1B0999999B14AC76 (vaccin_id), INDEX IDX_1B099999D56A5F49 (centre_vaccination_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vaccination ADD CONSTRAINT FK_1B0999996B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE vaccination ADD CONSTRAINT FK_1B0999999B14AC76 FOREIGN KEY (vaccin_id) REFERENCES vaccin (id)');
        $this->addSql('ALTER TABLE vaccination ADD CONSTRAINT FK_1B099999D56A5F49 FOREIGN KEY (centre_vaccination_id) REFERENCES centre_vaccination (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE vaccination');
    }
}
