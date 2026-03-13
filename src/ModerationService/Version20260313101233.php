<?php

declare(strict_types=1);

namespace NktMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260313101233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Добавление колонки round_id в таблицу lst_moderation_errors';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE lst_moderation_errors ADD COLUMN round_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE lst_moderation_errors DROP COLUMN round_id');
    }
}