<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140731040428 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE note_step (note_id INT NOT NULL, step_id INT NOT NULL, INDEX IDX_E3C3EF6426ED0855 (note_id), INDEX IDX_E3C3EF6473B21E9C (step_id), PRIMARY KEY(note_id, step_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE note_flow (note_id INT NOT NULL, flow_id INT NOT NULL, INDEX IDX_F2BAC72826ED0855 (note_id), INDEX IDX_F2BAC7287EB60D1B (flow_id), PRIMARY KEY(note_id, flow_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE note_step ADD CONSTRAINT FK_E3C3EF6426ED0855 FOREIGN KEY (note_id) REFERENCES note (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE note_step ADD CONSTRAINT FK_E3C3EF6473B21E9C FOREIGN KEY (step_id) REFERENCES step (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE note_flow ADD CONSTRAINT FK_F2BAC72826ED0855 FOREIGN KEY (note_id) REFERENCES note (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE note_flow ADD CONSTRAINT FK_F2BAC7287EB60D1B FOREIGN KEY (flow_id) REFERENCES flow (id) ON DELETE CASCADE");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE note_step");
        $this->addSql("DROP TABLE note_flow");
    }
}
