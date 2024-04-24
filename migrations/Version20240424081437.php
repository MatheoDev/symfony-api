<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240424081437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trajet_escale DROP CONSTRAINT fk_73f91c15d12a823');
        $this->addSql('ALTER TABLE trajet_escale DROP CONSTRAINT fk_73f91c1562ee4dee');
        $this->addSql('DROP TABLE trajet_escale');
        $this->addSql('ALTER TABLE escale ADD trajet_id UUID DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN escale.trajet_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE escale ADD CONSTRAINT FK_C39FEDD3D12A823 FOREIGN KEY (trajet_id) REFERENCES trajet (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_C39FEDD3D12A823 ON escale (trajet_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE trajet_escale (trajet_id UUID NOT NULL, escale_id UUID NOT NULL, PRIMARY KEY(trajet_id, escale_id))');
        $this->addSql('CREATE INDEX idx_73f91c1562ee4dee ON trajet_escale (escale_id)');
        $this->addSql('CREATE INDEX idx_73f91c15d12a823 ON trajet_escale (trajet_id)');
        $this->addSql('COMMENT ON COLUMN trajet_escale.trajet_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN trajet_escale.escale_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE trajet_escale ADD CONSTRAINT fk_73f91c15d12a823 FOREIGN KEY (trajet_id) REFERENCES trajet (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE trajet_escale ADD CONSTRAINT fk_73f91c1562ee4dee FOREIGN KEY (escale_id) REFERENCES escale (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE escale DROP CONSTRAINT FK_C39FEDD3D12A823');
        $this->addSql('DROP INDEX IDX_C39FEDD3D12A823');
        $this->addSql('ALTER TABLE escale DROP trajet_id');
    }
}
