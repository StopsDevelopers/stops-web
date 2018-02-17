<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180217091042 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE branch (id INT AUTO_INCREMENT NOT NULL, address_id INT DEFAULT NULL, profile_id INT DEFAULT NULL, business_id INT DEFAULT NULL, category_id INT DEFAULT NULL, name VARCHAR(40) NOT NULL, about LONGTEXT DEFAULT NULL, time_table LONGTEXT DEFAULT NULL, description LONGTEXT DEFAULT NULL, release_date DATE NOT NULL, UNIQUE INDEX UNIQ_BB861B1FF5B7AF75 (address_id), UNIQUE INDEX UNIQ_BB861B1FCCFA12B8 (profile_id), INDEX IDX_BB861B1FA89DB457 (business_id), INDEX IDX_BB861B1F12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE branch ADD CONSTRAINT FK_BB861B1FF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE branch ADD CONSTRAINT FK_BB861B1FCCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE branch ADD CONSTRAINT FK_BB861B1FA89DB457 FOREIGN KEY (business_id) REFERENCES business (id)');
        $this->addSql('ALTER TABLE branch ADD CONSTRAINT FK_BB861B1F12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE address ADD branch_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81DCD6CC49 FOREIGN KEY (branch_id) REFERENCES branch (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D4E6F81DCD6CC49 ON address (branch_id)');
        $this->addSql('ALTER TABLE profile ADD branch_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT FK_8157AA0FDCD6CC49 FOREIGN KEY (branch_id) REFERENCES branch (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8157AA0FDCD6CC49 ON profile (branch_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81DCD6CC49');
        $this->addSql('ALTER TABLE profile DROP FOREIGN KEY FK_8157AA0FDCD6CC49');
        $this->addSql('DROP TABLE branch');
        $this->addSql('DROP INDEX UNIQ_D4E6F81DCD6CC49 ON address');
        $this->addSql('ALTER TABLE address DROP branch_id');
        $this->addSql('DROP INDEX UNIQ_8157AA0FDCD6CC49 ON profile');
        $this->addSql('ALTER TABLE profile DROP branch_id');
    }
}
