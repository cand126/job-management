<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180223144910 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE company ADD location_id INT DEFAULT NULL, DROP location');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094F64D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('CREATE INDEX IDX_4FBF094F64D218E ON company (location_id)');
        $this->addSql('ALTER TABLE job ADD location_id INT DEFAULT NULL, DROP location');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F864D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('CREATE INDEX IDX_FBD8E0F864D218E ON job (location_id)');
        $this->addSql('ALTER TABLE job_type CHANGE name name VARCHAR(20) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094F64D218E');
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F864D218E');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP INDEX IDX_4FBF094F64D218E ON company');
        $this->addSql('ALTER TABLE company ADD location VARCHAR(20) NOT NULL COLLATE utf8_unicode_ci, DROP location_id');
        $this->addSql('DROP INDEX IDX_FBD8E0F864D218E ON job');
        $this->addSql('ALTER TABLE job ADD location VARCHAR(20) NOT NULL COLLATE utf8_unicode_ci, DROP location_id');
        $this->addSql('ALTER TABLE job_type CHANGE name name VARCHAR(100) NOT NULL COLLATE utf8_unicode_ci');
    }
}
