<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180217235016 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE coupon (id INT AUTO_INCREMENT NOT NULL, branch_id INT DEFAULT NULL, multimedia_id INT DEFAULT NULL, title VARCHAR(50) NOT NULL, description VARCHAR(200) NOT NULL, price SMALLINT NOT NULL, release_date DATETIME DEFAULT NULL, deadline DATETIME DEFAULT NULL, restriction LONGTEXT DEFAULT NULL, INDEX IDX_64BF3F02DCD6CC49 (branch_id), UNIQUE INDEX UNIQ_64BF3F0220531EB8 (multimedia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, business_id INT DEFAULT NULL, multimedia_id INT DEFAULT NULL, title VARCHAR(50) NOT NULL, description VARCHAR(200) NOT NULL, price SMALLINT NOT NULL, release_date DATETIME DEFAULT NULL, deadline DATETIME DEFAULT NULL, restriction LONGTEXT DEFAULT NULL, INDEX IDX_C11D7DD1A89DB457 (business_id), UNIQUE INDEX UNIQ_C11D7DD120531EB8 (multimedia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE coupon ADD CONSTRAINT FK_64BF3F02DCD6CC49 FOREIGN KEY (branch_id) REFERENCES branch (id)');
        $this->addSql('ALTER TABLE coupon ADD CONSTRAINT FK_64BF3F0220531EB8 FOREIGN KEY (multimedia_id) REFERENCES multimedia (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1A89DB457 FOREIGN KEY (business_id) REFERENCES business (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD120531EB8 FOREIGN KEY (multimedia_id) REFERENCES multimedia (id)');
        $this->addSql('ALTER TABLE award CHANGE type type enum(\'BONO_BIENVENIDA\', \'BONO_CLIENTE_FRCUENTE\', \'BONO_FAVORITO\')');
        $this->addSql('ALTER TABLE multimedia ADD promotion_id INT DEFAULT NULL, ADD coupon_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE multimedia ADD CONSTRAINT FK_61312863139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE multimedia ADD CONSTRAINT FK_6131286366C5951B FOREIGN KEY (coupon_id) REFERENCES coupon (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_61312863139DF194 ON multimedia (promotion_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6131286366C5951B ON multimedia (coupon_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE multimedia DROP FOREIGN KEY FK_6131286366C5951B');
        $this->addSql('ALTER TABLE multimedia DROP FOREIGN KEY FK_61312863139DF194');
        $this->addSql('DROP TABLE coupon');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('ALTER TABLE award CHANGE type type VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('DROP INDEX UNIQ_61312863139DF194 ON multimedia');
        $this->addSql('DROP INDEX UNIQ_6131286366C5951B ON multimedia');
        $this->addSql('ALTER TABLE multimedia DROP promotion_id, DROP coupon_id');
    }
}
