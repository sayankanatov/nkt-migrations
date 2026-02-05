<?php

declare(strict_types=1);

namespace NktMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260205102301 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Изменение name на NULLABLE в таблицы lst_goods';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE lst_goods ALTER COLUMN name DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE lst_goods ALTER COLUMN name TYPE VARCHAR(255) NOT NULL');
    }
}