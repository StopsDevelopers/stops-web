<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180214091820 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE business (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, description VARCHAR(50) DEFAULT NULL, release_date DATE DEFAULT NULL, is_active TINYINT(1) DEFAULT \'1\' NOT NULL, email VARCHAR(60) NOT NULL, password VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_8D36E38E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, icon VARCHAR(20) NOT NULL, name VARCHAR(30) NOT NULL, code VARCHAR(3) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stop (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, business_id INT DEFAULT NULL, release_date DATE NOT NULL, last_change_date DATETIME NOT NULL, count INT NOT NULL, INDEX IDX_B95616B6A76ED395 (user_id), INDEX IDX_B95616B6A89DB457 (business_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stop ADD CONSTRAINT FK_B95616B6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE stop ADD CONSTRAINT FK_B95616B6A89DB457 FOREIGN KEY (business_id) REFERENCES business (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stop DROP FOREIGN KEY FK_B95616B6A89DB457');
        $this->addSql('DROP TABLE business');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE stop');
    }
}
