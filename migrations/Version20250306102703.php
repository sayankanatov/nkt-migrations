<?php

declare(strict_types=1);

namespace NktMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250306102703 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Добавление индексов';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE INDEX idx_lst_barcodes_barcode ON lst_barcodes USING btree (barcode)');
        $this->addSql('CREATE INDEX idx_lst_attr_values_good_id ON lst_attr_values USING btree (good_id)');
        $this->addSql('CREATE INDEX idx_lst_photos_good_id ON lst_photos USING btree (good_id)');
        $this->addSql('CREATE INDEX idx_lst_good_categories_good_id ON lst_good_categories USING btree (good_id)');
        $this->addSql('CREATE INDEX idx_sys_edo_pharma_push_logs_good_id ON sys_edo_pharma_push_logs USING btree (good_id)');
        $this->addSql('CREATE INDEX idx_sys_transgran_export_logs_good_id ON sys_transgran_export_logs USING btree (good_id)');
        $this->addSql('CREATE INDEX idx_sys_transgran_import_logs_good_id ON sys_transgran_import_logs USING btree (good_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP INDEX idx_lst_barcodes_barcode');
        $this->addSql('DROP INDEX idx_lst_attr_values_good_id');
        $this->addSql('DROP INDEX idx_lst_photos_good_id');
        $this->addSql('DROP INDEX idx_lst_good_categories_good_id');
        $this->addSql('DROP INDEX idx_sys_edo_pharma_push_logs_good_id');
        $this->addSql('DROP INDEX idx_sys_transgran_export_logs_good_id');
        $this->addSql('DROP INDEX idx_sys_transgran_import_logs_good_id');
    }
}
