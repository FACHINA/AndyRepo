<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220528195133 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offres_caracteristiques (offres_id INT NOT NULL, caracteristiques_id INT NOT NULL, INDEX IDX_D4C441036C83CD9F (offres_id), INDEX IDX_D4C44103B2639FE4 (caracteristiques_id), PRIMARY KEY(offres_id, caracteristiques_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offres_caracteristiques ADD CONSTRAINT FK_D4C441036C83CD9F FOREIGN KEY (offres_id) REFERENCES offres (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offres_caracteristiques ADD CONSTRAINT FK_D4C44103B2639FE4 FOREIGN KEY (caracteristiques_id) REFERENCES caracteristiques (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE offres_caracteristiques');
    }
}
