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
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("CREATE TABLE sys_transgran_import_logs (
            id SERIAL PRIMARY KEY,
            good_id BIGINT UNSIGNED NOT NULL,
            account_id INT NOT NULL,
            barcode VARCHAR(255) NOT NULL,
            status ENUM('error','success') NOT NULL,
            validation_context TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE sys_transgran_import_logs');
    }
}
