<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180217095224 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE album (id INT AUTO_INCREMENT NOT NULL, branch_id INT DEFAULT NULL, title VARCHAR(50) NOT NULL, description VARCHAR(200) DEFAULT NULL, INDEX IDX_39986E43DCD6CC49 (branch_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE award (id INT AUTO_INCREMENT NOT NULL, business_id INT DEFAULT NULL, title VARCHAR(50) NOT NULL, description VARCHAR(200) NOT NULL, type enum(\'BONO_BIENVENIDA\', \'BONO_CLIENTE_FRCUENTE\', \'BONO_FAVORITO\'), restriction LONGTEXT NOT NULL, release_date DATETIME DEFAULT NULL, deadline DATETIME DEFAULT NULL, INDEX IDX_8A5B2EE7A89DB457 (business_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE multimedia (id INT AUTO_INCREMENT NOT NULL, album_id INT DEFAULT NULL, multimedia_type_id INT DEFAULT NULL, path LONGTEXT NOT NULL, date DATETIME DEFAULT NULL, description LONGTEXT DEFAULT NULL, privacy LONGTEXT DEFAULT NULL, INDEX IDX_613128631137ABCF (album_id), INDEX IDX_61312863784637B8 (multimedia_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE multimedia_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, code VARCHAR(3) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE album ADD CONSTRAINT FK_39986E43DCD6CC49 FOREIGN KEY (branch_id) REFERENCES branch (id)');
        $this->addSql('ALTER TABLE award ADD CONSTRAINT FK_8A5B2EE7A89DB457 FOREIGN KEY (business_id) REFERENCES business (id)');
        $this->addSql('ALTER TABLE multimedia ADD CONSTRAINT FK_613128631137ABCF FOREIGN KEY (album_id) REFERENCES album (id)');
        $this->addSql('ALTER TABLE multimedia ADD CONSTRAINT FK_61312863784637B8 FOREIGN KEY (multimedia_type_id) REFERENCES multimedia_type (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE multimedia DROP FOREIGN KEY FK_613128631137ABCF');
        $this->addSql('ALTER TABLE multimedia DROP FOREIGN KEY FK_61312863784637B8');
        $this->addSql('DROP TABLE album');
        $this->addSql('DROP TABLE award');
        $this->addSql('DROP TABLE multimedia');
        $this->addSql('DROP TABLE multimedia_type');
    }
}
