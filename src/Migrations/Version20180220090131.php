<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180220090131 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, profile_id INT DEFAULT NULL, post_id INT DEFAULT NULL, text LONGTEXT NOT NULL, date DATETIME NOT NULL, INDEX IDX_9474526CCCFA12B8 (profile_id), INDEX IDX_9474526C4B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment_reaction (id INT AUTO_INCREMENT NOT NULL, profile_id INT DEFAULT NULL, comment_id INT DEFAULT NULL, type enum(\'REACCION_ME_GUSTA\'), INDEX IDX_B99364F1CCFA12B8 (profile_id), INDEX IDX_B99364F1F8697D13 (comment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, profile_autor_id INT DEFAULT NULL, profile_destination_id INT DEFAULT NULL, type enum(\'USUARIO_COMENTO_POST\',\'USUARIO_COMENTO_COMENTARIO\',\'USUARIO_REACCIONO_POST\',\'USUARIO_REACCIONO_COMENTARIO\'), seen TINYINT(1) DEFAULT \'0\' NOT NULL, date DATETIME DEFAULT NULL, objective INT NOT NULL, UNIQUE INDEX UNIQ_BF5476CAEDBE3A0F (profile_autor_id), UNIQUE INDEX UNIQ_BF5476CA1A26A055 (profile_destination_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_reaction (id INT AUTO_INCREMENT NOT NULL, profile_id INT DEFAULT NULL, post_id INT DEFAULT NULL, type enum(\'REACCION_ME_GUSTA\'), INDEX IDX_1B3A8E56CCFA12B8 (profile_id), INDEX IDX_1B3A8E564B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CCCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C4B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE comment_reaction ADD CONSTRAINT FK_B99364F1CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE comment_reaction ADD CONSTRAINT FK_B99364F1F8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAEDBE3A0F FOREIGN KEY (profile_autor_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA1A26A055 FOREIGN KEY (profile_destination_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE post_reaction ADD CONSTRAINT FK_1B3A8E56CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE post_reaction ADD CONSTRAINT FK_1B3A8E564B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE award CHANGE type type enum(\'BONO_BIENVENIDA\', \'BONO_CLIENTE_FRCUENTE\', \'BONO_FAVORITO\')');
        $this->addSql('ALTER TABLE contact CHANGE type type enum(\'CONTACTO_FACEBOOK\',\'CONTACTO_TWITTER\',\'CONTACTO_SITIO_WEB\',\'CONTACTO_TELEFONO\',\'CONTACTO_CORREO\')');
        $this->addSql('ALTER TABLE post CHANGE privacy privacy enum(\'PRIVACIDAD_PUBLICO\',\'PRIVACIDAD_SOLO_YO\',\'PRIVACIDAD_SOLO_AMIGOS\')');
        $this->addSql('ALTER TABLE profile ADD notification_autor_id INT DEFAULT NULL, ADD notification_destination_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT FK_8157AA0F41C4631B FOREIGN KEY (notification_autor_id) REFERENCES notification (id)');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT FK_8157AA0F6382A99E FOREIGN KEY (notification_destination_id) REFERENCES notification (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8157AA0F41C4631B ON profile (notification_autor_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8157AA0F6382A99E ON profile (notification_destination_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comment_reaction DROP FOREIGN KEY FK_B99364F1F8697D13');
        $this->addSql('ALTER TABLE profile DROP FOREIGN KEY FK_8157AA0F41C4631B');
        $this->addSql('ALTER TABLE profile DROP FOREIGN KEY FK_8157AA0F6382A99E');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE comment_reaction');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE post_reaction');
        $this->addSql('ALTER TABLE award CHANGE type type VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE contact CHANGE type type VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE post CHANGE privacy privacy VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('DROP INDEX UNIQ_8157AA0F41C4631B ON profile');
        $this->addSql('DROP INDEX UNIQ_8157AA0F6382A99E ON profile');
        $this->addSql('ALTER TABLE profile DROP notification_autor_id, DROP notification_destination_id');
    }
}
