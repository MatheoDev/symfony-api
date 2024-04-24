<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240423151959 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE escale (id UUID NOT NULL, gare VARCHAR(255) NOT NULL, voie VARCHAR(255) NOT NULL, horaire TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN escale.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE trajet (id UUID NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN trajet.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE trajet_escale (trajet_id UUID NOT NULL, escale_id UUID NOT NULL, PRIMARY KEY(trajet_id, escale_id))');
        $this->addSql('CREATE INDEX IDX_73F91C15D12A823 ON trajet_escale (trajet_id)');
        $this->addSql('CREATE INDEX IDX_73F91C1562EE4DEE ON trajet_escale (escale_id)');
        $this->addSql('COMMENT ON COLUMN trajet_escale.trajet_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN trajet_escale.escale_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE trajet_escale ADD CONSTRAINT FK_73F91C15D12A823 FOREIGN KEY (trajet_id) REFERENCES trajet (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE trajet_escale ADD CONSTRAINT FK_73F91C1562EE4DEE FOREIGN KEY (escale_id) REFERENCES escale (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE trajet_escale DROP CONSTRAINT FK_73F91C15D12A823');
        $this->addSql('ALTER TABLE trajet_escale DROP CONSTRAINT FK_73F91C1562EE4DEE');
        $this->addSql('DROP TABLE escale');
        $this->addSql('DROP TABLE trajet');
        $this->addSql('DROP TABLE trajet_escale');
    }
}
