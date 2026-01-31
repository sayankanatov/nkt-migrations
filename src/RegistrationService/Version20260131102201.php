<?php

declare(strict_types=1);

namespace NktMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260131102201 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Изменение типа good_id в таблицы sys_registration_logs';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE sys_registration_logs ALTER COLUMN good_id TYPE BIGINT');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE sys_registration_logs ALTER COLUMN good_id TYPE BIGINT NOT NULL');
    }
}