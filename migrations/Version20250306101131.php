<?php

declare(strict_types=1);

namespace NktMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250306101131 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Создание таблицы sys_edo_pharma_certificates';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("
            CREATE TABLE sys_edo_pharma_certificates (
                id SERIAL PRIMARY KEY,
                account_id INT NOT NULL,
                type VARCHAR(255) NOT NULL,
                private_key TEXT NOT NULL,
                public_key TEXT NOT NULL,
                created_at TIMESTAMPTZ DEFAULT NOW(),
                updated_at TIMESTAMPTZ DEFAULT NOW()
            );
        ");
        
        $this->addSql("
            CREATE OR REPLACE FUNCTION trigger_set_timestamp()
            RETURNS TRIGGER AS $$
            BEGIN
                NEW.updated_at = NOW();
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;
        ");

        $this->addSql("
            CREATE TRIGGER set_timestamp
            BEFORE UPDATE ON sys_edo_pharma_certificates
            FOR EACH ROW
            EXECUTE FUNCTION trigger_set_timestamp();
        ");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE sys_edo_pharma_certificates');
        $this->addSql('DROP FUNCTION IF EXISTS trigger_set_timestamp');
    }
}
