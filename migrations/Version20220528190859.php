<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220528190859 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom_cat VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offres ADD categoriestooffres_id INT NOT NULL');
        $this->addSql('ALTER TABLE offres ADD CONSTRAINT FK_C6AC35444DDFA621 FOREIGN KEY (categoriestooffres_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_C6AC35444DDFA621 ON offres (categoriestooffres_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offres DROP FOREIGN KEY FK_C6AC35444DDFA621');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP INDEX IDX_C6AC35444DDFA621 ON offres');
        $this->addSql('ALTER TABLE offres DROP categoriestooffres_id');
    }
}
