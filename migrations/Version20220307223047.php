<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220307223047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE possession ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE possession ADD CONSTRAINT FK_F9EE3F4219EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_F9EE3F4219EB6921 ON possession (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client CHANGE lastname lastname VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE firstname firstname VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adress adress VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tel tel VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE possession DROP FOREIGN KEY FK_F9EE3F4219EB6921');
        $this->addSql('DROP INDEX IDX_F9EE3F4219EB6921 ON possession');
        $this->addSql('ALTER TABLE possession DROP client_id, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE type type VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
