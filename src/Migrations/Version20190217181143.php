<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190217181143 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE answer ADD question_id INT NOT NULL');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A251E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('CREATE INDEX IDX_DADD4A251E27F6BF ON answer (question_id)');
        $this->addSql('ALTER TABLE qcm ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE qcm ADD CONSTRAINT FK_D7A1FEF4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D7A1FEF4A76ED395 ON qcm (user_id)');
        $this->addSql('ALTER TABLE qcm_question ADD question_id INT NOT NULL, ADD qcm_id INT NOT NULL');
        $this->addSql('ALTER TABLE qcm_question ADD CONSTRAINT FK_572B6C8D1E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE qcm_question ADD CONSTRAINT FK_572B6C8DFF6241A6 FOREIGN KEY (qcm_id) REFERENCES qcm (id)');
        $this->addSql('CREATE INDEX IDX_572B6C8D1E27F6BF ON qcm_question (question_id)');
        $this->addSql('CREATE INDEX IDX_572B6C8DFF6241A6 ON qcm_question (qcm_id)');
        $this->addSql('ALTER TABLE question ADD user_id INT NOT NULL, ADD theme_id INT NOT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E59027487 FOREIGN KEY (theme_id) REFERENCES theme (id)');
        $this->addSql('CREATE INDEX IDX_B6F7494EA76ED395 ON question (user_id)');
        $this->addSql('CREATE INDEX IDX_B6F7494E59027487 ON question (theme_id)');
        $this->addSql('ALTER TABLE result ADD user_id INT NOT NULL, ADD qcm_id INT NOT NULL');
        $this->addSql('ALTER TABLE result ADD CONSTRAINT FK_136AC113A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE result ADD CONSTRAINT FK_136AC113FF6241A6 FOREIGN KEY (qcm_id) REFERENCES qcm (id)');
        $this->addSql('CREATE INDEX IDX_136AC113A76ED395 ON result (user_id)');
        $this->addSql('CREATE INDEX IDX_136AC113FF6241A6 ON result (qcm_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A251E27F6BF');
        $this->addSql('DROP INDEX IDX_DADD4A251E27F6BF ON answer');
        $this->addSql('ALTER TABLE answer DROP question_id');
        $this->addSql('ALTER TABLE qcm DROP FOREIGN KEY FK_D7A1FEF4A76ED395');
        $this->addSql('DROP INDEX IDX_D7A1FEF4A76ED395 ON qcm');
        $this->addSql('ALTER TABLE qcm DROP user_id');
        $this->addSql('ALTER TABLE qcm_question DROP FOREIGN KEY FK_572B6C8D1E27F6BF');
        $this->addSql('ALTER TABLE qcm_question DROP FOREIGN KEY FK_572B6C8DFF6241A6');
        $this->addSql('DROP INDEX IDX_572B6C8D1E27F6BF ON qcm_question');
        $this->addSql('DROP INDEX IDX_572B6C8DFF6241A6 ON qcm_question');
        $this->addSql('ALTER TABLE qcm_question DROP question_id, DROP qcm_id');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EA76ED395');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E59027487');
        $this->addSql('DROP INDEX IDX_B6F7494EA76ED395 ON question');
        $this->addSql('DROP INDEX IDX_B6F7494E59027487 ON question');
        $this->addSql('ALTER TABLE question DROP user_id, DROP theme_id');
        $this->addSql('ALTER TABLE result DROP FOREIGN KEY FK_136AC113A76ED395');
        $this->addSql('ALTER TABLE result DROP FOREIGN KEY FK_136AC113FF6241A6');
        $this->addSql('DROP INDEX IDX_136AC113A76ED395 ON result');
        $this->addSql('DROP INDEX IDX_136AC113FF6241A6 ON result');
        $this->addSql('ALTER TABLE result DROP user_id, DROP qcm_id');
    }
}
