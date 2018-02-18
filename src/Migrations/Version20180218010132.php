<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180218010132 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE claim_award (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, award_id INT DEFAULT NULL, release_date DATETIME NOT NULL, INDEX IDX_B616C5A1A76ED395 (user_id), INDEX IDX_B616C5A13D5282CF (award_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE claim_coupon (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, coupon_id INT DEFAULT NULL, release_date DATETIME NOT NULL, INDEX IDX_FB3C964CA76ED395 (user_id), INDEX IDX_FB3C964C66C5951B (coupon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE claim_promotion (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, promotion_id INT DEFAULT NULL, release_date DATETIME NOT NULL, INDEX IDX_B06D08BEA76ED395 (user_id), INDEX IDX_B06D08BE139DF194 (promotion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE claim_award ADD CONSTRAINT FK_B616C5A1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE claim_award ADD CONSTRAINT FK_B616C5A13D5282CF FOREIGN KEY (award_id) REFERENCES award (id)');
        $this->addSql('ALTER TABLE claim_coupon ADD CONSTRAINT FK_FB3C964CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE claim_coupon ADD CONSTRAINT FK_FB3C964C66C5951B FOREIGN KEY (coupon_id) REFERENCES coupon (id)');
        $this->addSql('ALTER TABLE claim_promotion ADD CONSTRAINT FK_B06D08BEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE claim_promotion ADD CONSTRAINT FK_B06D08BE139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE award CHANGE type type enum(\'BONO_BIENVENIDA\', \'BONO_CLIENTE_FRCUENTE\', \'BONO_FAVORITO\')');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE claim_award');
        $this->addSql('DROP TABLE claim_coupon');
        $this->addSql('DROP TABLE claim_promotion');
        $this->addSql('ALTER TABLE award CHANGE type type VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
    }
}
