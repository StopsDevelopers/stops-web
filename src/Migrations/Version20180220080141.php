<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180220080141 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE follow (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, profile_id INT DEFAULT NULL, release_date DATE NOT NULL, INDEX IDX_68344470A76ED395 (user_id), INDEX IDX_68344470CCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, profile_id INT DEFAULT NULL, multimedia_id INT DEFAULT NULL, location LONGTEXT DEFAULT NULL, text LONGTEXT DEFAULT NULL, release_date DATETIME NOT NULL, privacy enum(\'PRIVACIDAD_PUBLICO\',\'PRIVACIDAD_SOLO_YO\',\'PRIVACIDAD_SOLO_AMIGOS\'), tag LONGTEXT DEFAULT NULL, INDEX IDX_5A8A6C8DCCFA12B8 (profile_id), UNIQUE INDEX UNIQ_5A8A6C8D20531EB8 (multimedia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE share (id INT AUTO_INCREMENT NOT NULL, profile_id INT DEFAULT NULL, post_id INT DEFAULT NULL, date DATETIME NOT NULL, INDEX IDX_EF069D5ACCFA12B8 (profile_id), INDEX IDX_EF069D5A4B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE topic (id INT AUTO_INCREMENT NOT NULL, branch_id INT DEFAULT NULL, word_id INT DEFAULT NULL, INDEX IDX_9D40DE1BDCD6CC49 (branch_id), INDEX IDX_9D40DE1BE357438D (word_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE word (id INT AUTO_INCREMENT NOT NULL, word VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE follow ADD CONSTRAINT FK_68344470A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE follow ADD CONSTRAINT FK_68344470CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DCCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D20531EB8 FOREIGN KEY (multimedia_id) REFERENCES multimedia (id)');
        $this->addSql('ALTER TABLE share ADD CONSTRAINT FK_EF069D5ACCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE share ADD CONSTRAINT FK_EF069D5A4B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE topic ADD CONSTRAINT FK_9D40DE1BDCD6CC49 FOREIGN KEY (branch_id) REFERENCES branch (id)');
        $this->addSql('ALTER TABLE topic ADD CONSTRAINT FK_9D40DE1BE357438D FOREIGN KEY (word_id) REFERENCES word (id)');
        $this->addSql('ALTER TABLE award CHANGE type type enum(\'BONO_BIENVENIDA\', \'BONO_CLIENTE_FRCUENTE\', \'BONO_FAVORITO\')');
        $this->addSql('ALTER TABLE contact CHANGE type type enum(\'CONTACTO_FACEBOOK\',\'CONTACTO_TWITTER\',\'CONTACTO_SITIO_WEB\',\'CONTACTO_TELEFONO\',\'CONTACTO_CORREO\')');
        $this->addSql('ALTER TABLE multimedia ADD post_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE multimedia ADD CONSTRAINT FK_613128634B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_613128634B89032C ON multimedia (post_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE multimedia DROP FOREIGN KEY FK_613128634B89032C');
        $this->addSql('ALTER TABLE share DROP FOREIGN KEY FK_EF069D5A4B89032C');
        $this->addSql('ALTER TABLE topic DROP FOREIGN KEY FK_9D40DE1BE357438D');
        $this->addSql('DROP TABLE follow');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE share');
        $this->addSql('DROP TABLE topic');
        $this->addSql('DROP TABLE word');
        $this->addSql('ALTER TABLE award CHANGE type type VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE contact CHANGE type type VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('DROP INDEX UNIQ_613128634B89032C ON multimedia');
        $this->addSql('ALTER TABLE multimedia DROP post_id');
    }
}
