<?php

declare(strict_types=1);

namespace NktMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250314093046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Добавление внешних ключей';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE sys_edo_pharma_push_logs ADD CONSTRAINT FK_pharma_push_logs_good FOREIGN KEY (good_id) REFERENCES lst_goods (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sys_transgran_export_logs ADD CONSTRAINT FK_transgran_export_logs_good FOREIGN KEY (good_id) REFERENCES lst_goods (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sys_transgran_import_logs ADD CONSTRAINT FK_transgran_import_logs_good FOREIGN KEY (good_id) REFERENCES lst_goods (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE sys_edo_pharma_push_logs DROP CONSTRAINT FK_pharma_push_logs_good');
        $this->addSql('ALTER TABLE sys_transgran_export_logs DROP CONSTRAINT FK_transgran_export_logs_good');
        $this->addSql('ALTER TABLE sys_transgran_import_logs DROP CONSTRAINT FK_transgran_import_logs_good');
    }
}
