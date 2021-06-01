<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210529194659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE centre_vaccination CHANGE nombre_vaccin_disponible nombre_vaccin_disponible INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vaccination CHANGE patient_id patient_id INT DEFAULT NULL, CHANGE vaccin_id vaccin_id INT DEFAULT NULL, CHANGE centre_vaccination_id centre_vaccination_id INT DEFAULT NULL, CHANGE statut statut VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE centre_vaccination CHANGE nombre_vaccin_disponible nombre_vaccin_disponible INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vaccination CHANGE patient_id patient_id INT DEFAULT NULL, CHANGE vaccin_id vaccin_id INT DEFAULT NULL, CHANGE centre_vaccination_id centre_vaccination_id INT DEFAULT NULL, CHANGE statut statut VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
