<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140802143833 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE paragraph DROP FOREIGN KEY FK_7DD39862248F6BB5");
        $this->addSql("DROP INDEX UNIQ_7DD39862248F6BB5 ON paragraph");
        $this->addSql("ALTER TABLE paragraph DROP raci_id");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE paragraph ADD raci_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE paragraph ADD CONSTRAINT FK_7DD39862248F6BB5 FOREIGN KEY (raci_id) REFERENCES raci (id)");
        $this->addSql("CREATE UNIQUE INDEX UNIQ_7DD39862248F6BB5 ON paragraph (raci_id)");
    }
}
