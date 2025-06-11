<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250611075537 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE terrain_user (terrain_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_77F66E1E8A2D8B41 (terrain_id), INDEX IDX_77F66E1EA76ED395 (user_id), PRIMARY KEY(terrain_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE terrain_user ADD CONSTRAINT FK_77F66E1E8A2D8B41 FOREIGN KEY (terrain_id) REFERENCES terrain (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE terrain_user ADD CONSTRAINT FK_77F66E1EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE terrain_user DROP FOREIGN KEY FK_77F66E1E8A2D8B41
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE terrain_user DROP FOREIGN KEY FK_77F66E1EA76ED395
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE terrain_user
        SQL);
    }
}
