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
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("CREATE TABLE lst_good_categories (
            id SERIAL PRIMARY KEY,
            good_id BIGINT UNSIGNED NOT NULL,
            cat_id INT NOT NULL,
            status ENUM('published','draft', 'canceled') NOT NULL,
            is_deleted TINYINT(1) NOT NULL DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE lst_good_categories');
    }
}
