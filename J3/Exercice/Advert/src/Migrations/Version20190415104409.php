<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190415104409 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE inter_skill (inter_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_A44479DEE858909E (inter_id), INDEX IDX_A44479DE5585C142 (skill_id), PRIMARY KEY(inter_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE inter_skill ADD CONSTRAINT FK_A44479DEE858909E FOREIGN KEY (inter_id) REFERENCES inter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inter_skill ADD CONSTRAINT FK_A44479DE5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inter ADD advert_id INT NOT NULL, ADD level_id INT NOT NULL, DROP skill, DROP level, DROP adver');
        $this->addSql('ALTER TABLE inter ADD CONSTRAINT FK_7C802D6FD07ECCB6 FOREIGN KEY (advert_id) REFERENCES advert (id)');
        $this->addSql('ALTER TABLE inter ADD CONSTRAINT FK_7C802D6F5FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id)');
        $this->addSql('CREATE INDEX IDX_7C802D6FD07ECCB6 ON inter (advert_id)');
        $this->addSql('CREATE INDEX IDX_7C802D6F5FB14BA7 ON inter (level_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE inter_skill');
        $this->addSql('ALTER TABLE inter DROP FOREIGN KEY FK_7C802D6FD07ECCB6');
        $this->addSql('ALTER TABLE inter DROP FOREIGN KEY FK_7C802D6F5FB14BA7');
        $this->addSql('DROP INDEX IDX_7C802D6FD07ECCB6 ON inter');
        $this->addSql('DROP INDEX IDX_7C802D6F5FB14BA7 ON inter');
        $this->addSql('ALTER TABLE inter ADD skill VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD level VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD adver VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP advert_id, DROP level_id');
    }
}
