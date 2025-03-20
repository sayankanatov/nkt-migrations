<?php

declare(strict_types=1);

namespace NktMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250306101128 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Создание таблицы lst_good_categories';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TABLE lst_good_categories (
            id SERIAL PRIMARY KEY,
            good_id BIGINT NOT NULL,
            cat_id INT NOT NULL,
            status VARCHAR(10) CHECK (status IN ('published', 'draft', 'canceled')) NOT NULL,
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

        $this->addSql('CREATE TRIGGER set_timestamp BEFORE UPDATE ON lst_good_categories FOR EACH ROW EXECUTE FUNCTION trigger_set_timestamp();');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TRIGGER IF EXISTS set_timestamp ON lst_good_categories');
        $this->addSql('DROP FUNCTION IF EXISTS trigger_set_timestamp');
        $this->addSql('DROP TABLE lst_good_categories');
    }
}
