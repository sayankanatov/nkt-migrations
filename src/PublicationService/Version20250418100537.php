<?php

declare(strict_types=1);

namespace NktMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250418100537 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Создание таблицы sys_publication_logs';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TABLE sys_publication_logs (
            id SERIAL PRIMARY KEY,
            good_id BIGINT NOT NULL,
            response TEXT,
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

        $this->addSql('CREATE TRIGGER set_timestamp BEFORE UPDATE ON sys_publication_logs FOR EACH ROW EXECUTE FUNCTION trigger_set_timestamp();');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TRIGGER IF EXISTS set_timestamp ON sys_publication_logs');
        $this->addSql('DROP FUNCTION IF EXISTS trigger_set_timestamp');
        $this->addSql('DROP TABLE sys_publication_logs');
    }
}
