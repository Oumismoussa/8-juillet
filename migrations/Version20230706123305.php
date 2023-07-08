<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230706123305 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE property_search (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE famille ADD pinces_a_disséquer VARCHAR(100) NOT NULL, ADD pinces_à_préhension VARCHAR(100) NOT NULL, ADD ecarteurs_simples VARCHAR(100) NOT NULL, ADD ecarteurs_doubles VARCHAR(100) NOT NULL, ADD clamps_vasculaires VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE property_search');
        $this->addSql('ALTER TABLE famille DROP pinces_a_disséquer, DROP pinces_à_préhension, DROP ecarteurs_simples, DROP ecarteurs_doubles, DROP clamps_vasculaires');
    }
}
