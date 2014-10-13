<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140805144656 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE user_scaling_parameters ADD user_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE user_scaling_parameters ADD CONSTRAINT FK_DC27B66DA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user_user (id)");
        $this->addSql("CREATE UNIQUE INDEX UNIQ_DC27B66DA76ED395 ON user_scaling_parameters (user_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE user_scaling_parameters DROP FOREIGN KEY FK_DC27B66DA76ED395");
        $this->addSql("DROP INDEX UNIQ_DC27B66DA76ED395 ON user_scaling_parameters");
        $this->addSql("ALTER TABLE user_scaling_parameters DROP user_id");
    }
}
