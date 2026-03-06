<?php

declare(strict_types=1);

namespace NktMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260306108104 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Создание таблицы lst_moderation_errors';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TABLE lst_moderation_errors (
            id SERIAL PRIMARY KEY,
            good_id BIGINT NOT NULL,
            attr_id INT NOT NULL,
            attr_value TEXT NOT NULL,
            attr_type VARCHAR(255) DEFAULT NULL,
            comment TEXT,
            created_at TIMESTAMPTZ(0) DEFAULT NOW(),
            updated_at TIMESTAMPTZ(0) DEFAULT NOW()
        )");

        $this->addSql('CREATE OR REPLACE FUNCTION trigger_set_timestamp()
            RETURNS TRIGGER AS $$
            BEGIN
                NEW.updated_at = NOW();
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;');

        $this->addSql('CREATE TRIGGER set_timestamp BEFORE UPDATE ON lst_moderation_errors FOR EACH ROW EXECUTE FUNCTION trigger_set_timestamp();');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TRIGGER IF EXISTS set_timestamp ON lst_moderation_errors');
        $this->addSql('DROP FUNCTION IF EXISTS trigger_set_timestamp');
        $this->addSql('DROP TABLE lst_moderation_errors');
    }
}