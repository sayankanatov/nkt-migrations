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
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("CREATE TABLE lst_goods (
            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            barcode_id INT DEFAULT NULL,
            status ENUM('published', 'draft', 'archived', 'on-moderation', 'in-queue') NOT NULL,
            account_id INT NOT NULL,
            user_id INT NOT NULL,
            packing_purpose ENUM('consumer', 'group', 'transport') NOT NULL,
            is_deleted TINYINT(1) NOT NULL DEFAULT 0,
            is_valid TINYINT(1) NOT NULL DEFAULT 0,
            is_visible TINYINT(1) NOT NULL DEFAULT 0,
            is_exemplar TINYINT(1) NOT NULL DEFAULT 0,
            version_number INT NOT NULL DEFAULT 1,
            main_good_id INT DEFAULT NULL,
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            archived_at DATETIME DEFAULT NULL,
            publicated_at DATETIME DEFAULT NULL) 
            DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;");

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE lst_goods');
    }
}
