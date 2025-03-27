<?php

declare(strict_types=1);

namespace NktMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250306090845 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Создание таблицы lst_goods';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TABLE lst_goods (
            id BIGSERIAL PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            barcode_id INT NOT NULL,
            status VARCHAR(20) NOT NULL CHECK (status IN ('published', 'draft', 'archived', 'on-moderation', 'in-queue', 'not-signed', 'with-errors')),
            account_id INT NOT NULL,
            user_id INT NOT NULL,
            packing_purpose VARCHAR(20) NOT NULL CHECK (packing_purpose IN ('consumer', 'group', 'transport')),
            is_deleted BOOLEAN NOT NULL DEFAULT FALSE,
            is_valid BOOLEAN NOT NULL DEFAULT FALSE,
            is_visible BOOLEAN NOT NULL DEFAULT FALSE,
            is_exemplar BOOLEAN NOT NULL DEFAULT FALSE,
            version_number INT NOT NULL DEFAULT 1,
            main_good_id INT DEFAULT NULL,
            created_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
            updated_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
            archived_at TIMESTAMPTZ DEFAULT NULL,
            publicated_at TIMESTAMPTZ DEFAULT NULL
        )");

        $this->addSql("CREATE OR REPLACE FUNCTION trigger_set_timestamp()
            RETURNS TRIGGER AS $$
            BEGIN
                NEW.updated_at = NOW();
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;");

        $this->addSql("CREATE TRIGGER set_timestamp BEFORE UPDATE ON lst_goods FOR EACH ROW EXECUTE FUNCTION trigger_set_timestamp();");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TRIGGER IF EXISTS set_timestamp ON lst_goods');
        $this->addSql('DROP FUNCTION IF EXISTS trigger_set_timestamp');
        $this->addSql('DROP TABLE lst_goods');
    }
}
