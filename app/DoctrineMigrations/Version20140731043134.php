<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140731043134 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE note_flow");
        $this->addSql("DROP TABLE note_step");
        $this->addSql("ALTER TABLE note ADD step_id INT DEFAULT NULL, ADD flow_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1473B21E9C FOREIGN KEY (step_id) REFERENCES step (id)");
        $this->addSql("ALTER TABLE note ADD CONSTRAINT FK_CFBDFA147EB60D1B FOREIGN KEY (flow_id) REFERENCES flow (id)");
        $this->addSql("CREATE INDEX IDX_CFBDFA1473B21E9C ON note (step_id)");
        $this->addSql("CREATE INDEX IDX_CFBDFA147EB60D1B ON note (flow_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE note_flow (note_id INT NOT NULL, flow_id INT NOT NULL, INDEX IDX_F2BAC72826ED0855 (note_id), INDEX IDX_F2BAC7287EB60D1B (flow_id), PRIMARY KEY(note_id, flow_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE note_step (note_id INT NOT NULL, step_id INT NOT NULL, INDEX IDX_E3C3EF6426ED0855 (note_id), INDEX IDX_E3C3EF6473B21E9C (step_id), PRIMARY KEY(note_id, step_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE note_flow ADD CONSTRAINT FK_F2BAC7287EB60D1B FOREIGN KEY (flow_id) REFERENCES flow (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE note_flow ADD CONSTRAINT FK_F2BAC72826ED0855 FOREIGN KEY (note_id) REFERENCES note (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE note_step ADD CONSTRAINT FK_E3C3EF6473B21E9C FOREIGN KEY (step_id) REFERENCES step (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE note_step ADD CONSTRAINT FK_E3C3EF6426ED0855 FOREIGN KEY (note_id) REFERENCES note (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA1473B21E9C");
        $this->addSql("ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA147EB60D1B");
        $this->addSql("DROP INDEX IDX_CFBDFA1473B21E9C ON note");
        $this->addSql("DROP INDEX IDX_CFBDFA147EB60D1B ON note");
        $this->addSql("ALTER TABLE note DROP step_id, DROP flow_id");
    }
}
