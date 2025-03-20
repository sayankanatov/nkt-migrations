<?php

declare(strict_types=1);

namespace NktMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250306101133 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Создание таблицы sys_transgran_import_logs';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("
            CREATE TABLE sys_transgran_import_logs (
                id SERIAL PRIMARY KEY,
                good_id BIGINT NOT NULL,
                account_id INT NOT NULL,
                barcode VARCHAR(255) NOT NULL,
                status VARCHAR(7) NOT NULL CHECK (status IN ('error', 'success')),
                validation_context TEXT,
                created_at TIMESTAMPTZ DEFAULT NOW(),
                updated_at TIMESTAMPTZ DEFAULT NOW()
            );
        ");
        
        $this->addSql("
            CREATE TRIGGER set_timestamp_sys_transgran_import
            BEFORE UPDATE ON sys_transgran_import_logs
            FOR EACH ROW
            EXECUTE FUNCTION trigger_set_timestamp();
        ");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE sys_transgran_import_logs');
        $this->addSql('DROP TRIGGER IF EXISTS set_timestamp_sys_transgran_import ON sys_transgran_import_logs');
    }
}
