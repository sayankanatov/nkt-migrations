<?php

declare(strict_types=1);

namespace NktMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250424100538 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Создание таблицы lst_photos';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TABLE lst_photos (
            id SERIAL PRIMARY KEY,
            good_id BIGINT NOT NULL,
            uri TEXT NOT NULL,
            photo_type VARCHAR(255) NOT NULL,
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

        $this->addSql('CREATE TRIGGER set_timestamp BEFORE UPDATE ON lst_photos FOR EACH ROW EXECUTE FUNCTION trigger_set_timestamp();');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TRIGGER IF EXISTS set_timestamp ON lst_photos');
        $this->addSql('DROP FUNCTION IF EXISTS trigger_set_timestamp');
        $this->addSql('DROP TABLE lst_photos');
    }
}