<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140802202148 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE substructure_flow_process (substructure_id INT NOT NULL, flow_id INT NOT NULL, INDEX IDX_887C5D79E70C7EB (substructure_id), INDEX IDX_887C5D77EB60D1B (flow_id), PRIMARY KEY(substructure_id, flow_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE substructure_flow_after (substructure_id INT NOT NULL, flow_id INT NOT NULL, INDEX IDX_F5F75B29E70C7EB (substructure_id), INDEX IDX_F5F75B27EB60D1B (flow_id), PRIMARY KEY(substructure_id, flow_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE substructure_flow_after_yes (substructure_id INT NOT NULL, flow_id INT NOT NULL, INDEX IDX_70515CF39E70C7EB (substructure_id), INDEX IDX_70515CF37EB60D1B (flow_id), PRIMARY KEY(substructure_id, flow_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE substructure_flow_after_no (substructure_id INT NOT NULL, flow_id INT NOT NULL, INDEX IDX_D19461D89E70C7EB (substructure_id), INDEX IDX_D19461D87EB60D1B (flow_id), PRIMARY KEY(substructure_id, flow_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE substructure_flow_process ADD CONSTRAINT FK_887C5D79E70C7EB FOREIGN KEY (substructure_id) REFERENCES structure_file_substructure (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE substructure_flow_process ADD CONSTRAINT FK_887C5D77EB60D1B FOREIGN KEY (flow_id) REFERENCES flow (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE substructure_flow_after ADD CONSTRAINT FK_F5F75B29E70C7EB FOREIGN KEY (substructure_id) REFERENCES structure_file_substructure (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE substructure_flow_after ADD CONSTRAINT FK_F5F75B27EB60D1B FOREIGN KEY (flow_id) REFERENCES flow (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE substructure_flow_after_yes ADD CONSTRAINT FK_70515CF39E70C7EB FOREIGN KEY (substructure_id) REFERENCES structure_file_substructure (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE substructure_flow_after_yes ADD CONSTRAINT FK_70515CF37EB60D1B FOREIGN KEY (flow_id) REFERENCES flow (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE substructure_flow_after_no ADD CONSTRAINT FK_D19461D89E70C7EB FOREIGN KEY (substructure_id) REFERENCES structure_file_substructure (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE substructure_flow_after_no ADD CONSTRAINT FK_D19461D87EB60D1B FOREIGN KEY (flow_id) REFERENCES flow (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE structure_file_substructure DROP FOREIGN KEY FK_6ECEBAC44908F95E");
        $this->addSql("ALTER TABLE structure_file_substructure DROP FOREIGN KEY FK_6ECEBAC43F88E3AD");
        $this->addSql("ALTER TABLE structure_file_substructure DROP FOREIGN KEY FK_6ECEBAC47EC2F574");
        $this->addSql("ALTER TABLE structure_file_substructure DROP FOREIGN KEY FK_6ECEBAC4852C54C");
        $this->addSql("DROP INDEX IDX_6ECEBAC47EC2F574 ON structure_file_substructure");
        $this->addSql("DROP INDEX IDX_6ECEBAC4852C54C ON structure_file_substructure");
        $this->addSql("DROP INDEX IDX_6ECEBAC43F88E3AD ON structure_file_substructure");
        $this->addSql("DROP INDEX IDX_6ECEBAC44908F95E ON structure_file_substructure");
        $this->addSql("ALTER TABLE structure_file_substructure DROP after_no_id, DROP after_yes_id, DROP process_id, DROP after_id");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE substructure_flow_process");
        $this->addSql("DROP TABLE substructure_flow_after");
        $this->addSql("DROP TABLE substructure_flow_after_yes");
        $this->addSql("DROP TABLE substructure_flow_after_no");
        $this->addSql("ALTER TABLE structure_file_substructure ADD after_no_id INT DEFAULT NULL, ADD after_yes_id INT DEFAULT NULL, ADD process_id INT DEFAULT NULL, ADD after_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE structure_file_substructure ADD CONSTRAINT FK_6ECEBAC44908F95E FOREIGN KEY (after_no_id) REFERENCES flow (id)");
        $this->addSql("ALTER TABLE structure_file_substructure ADD CONSTRAINT FK_6ECEBAC43F88E3AD FOREIGN KEY (after_yes_id) REFERENCES flow (id)");
        $this->addSql("ALTER TABLE structure_file_substructure ADD CONSTRAINT FK_6ECEBAC47EC2F574 FOREIGN KEY (process_id) REFERENCES flow (id)");
        $this->addSql("ALTER TABLE structure_file_substructure ADD CONSTRAINT FK_6ECEBAC4852C54C FOREIGN KEY (after_id) REFERENCES flow (id)");
        $this->addSql("CREATE INDEX IDX_6ECEBAC47EC2F574 ON structure_file_substructure (process_id)");
        $this->addSql("CREATE INDEX IDX_6ECEBAC4852C54C ON structure_file_substructure (after_id)");
        $this->addSql("CREATE INDEX IDX_6ECEBAC43F88E3AD ON structure_file_substructure (after_yes_id)");
        $this->addSql("CREATE INDEX IDX_6ECEBAC44908F95E ON structure_file_substructure (after_no_id)");
    }
}
