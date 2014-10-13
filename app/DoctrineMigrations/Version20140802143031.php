<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140802143031 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE raci DROP FOREIGN KEY FK_D3D9F7848B50597F");
        $this->addSql("ALTER TABLE raci ADD CONSTRAINT FK_D3D9F7848B50597F FOREIGN KEY (paragraph_id) REFERENCES paragraph (id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE raci DROP FOREIGN KEY FK_D3D9F7848B50597F");
        $this->addSql("ALTER TABLE raci ADD CONSTRAINT FK_D3D9F7848B50597F FOREIGN KEY (paragraph_id) REFERENCES raci (id)");
    }
}
