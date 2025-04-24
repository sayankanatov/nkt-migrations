<?php

declare(strict_types=1);

namespace NktMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250424100536 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Создание таблицы lst_attr_values';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TABLE lst_attr_values (
            id SERIAL PRIMARY KEY,
            attr_id INT NOT NULL,
            value TEXT NOT NULL,
            type VARCHAR(255) NOT NULL,
            status VARCHAR(10) CHECK (status IN ('draft', 'published', 'canceled')) NOT NULL,
            good_id BIGINT NOT NULL,
            data_qualifier TEXT,
            source VARCHAR(10) DEFAULT 'nkt' CHECK (source IN ('ekls', 'gs1', 'nkt')),
            is_visible BOOLEAN NOT NULL DEFAULT TRUE,
            is_deleted BOOLEAN NOT NULL DEFAULT FALSE,
            created_at TIMESTAMPTZ DEFAULT NOW(),
            updated_at TIMESTAMPTZ DEFAULT NOW()
        )");

        $this->addSql('CREATE OR REPLACE FUNCTION trigger_set_timestamp()
            RETURNS TRIGGER AS $$
            BEGIN
                NEW.updated_at = NOW();
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;');

        $this->addSql('CREATE TRIGGER set_timestamp BEFORE UPDATE ON lst_attr_values FOR EACH ROW EXECUTE FUNCTION trigger_set_timestamp();');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TRIGGER IF EXISTS set_timestamp ON lst_attr_values');
        $this->addSql('DROP FUNCTION IF EXISTS trigger_set_timestamp');
        $this->addSql('DROP TABLE lst_attr_values');
    }
}