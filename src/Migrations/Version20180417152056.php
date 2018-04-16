<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180417152056 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE support ADD project_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE support ADD CONSTRAINT FK_8004EBA5166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('CREATE INDEX IDX_8004EBA5166D1F9C ON support (project_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE support DROP FOREIGN KEY FK_8004EBA5166D1F9C');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP INDEX IDX_8004EBA5166D1F9C ON support');
        $this->addSql('ALTER TABLE support DROP project_id');
    }
}
