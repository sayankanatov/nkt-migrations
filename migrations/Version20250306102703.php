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
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE INDEX idx_lst_signed_goods_good_id ON lst_signed_goods (good_id)');
        $this->addSql('CREATE INDEX idx_lst_attr_values_good_id ON lst_attr_values (good_id)');
        $this->addSql('CREATE INDEX idx_lst_photos_good_id ON lst_photos (good_id)');
        $this->addSql('CREATE INDEX idx_lst_good_categories_good_id ON lst_good_categories (good_id)');
        $this->addSql('CREATE INDEX idx_sys_publication_logs_good_id ON sys_publication_logs (good_id)');
        $this->addSql('CREATE INDEX idx_sys_edo_pharma_push_logs_good_id ON sys_edo_pharma_push_logs (good_id)');
        $this->addSql('CREATE INDEX idx_sys_transgran_export_logs_good_id ON sys_transgran_export_logs (good_id)');
        $this->addSql('CREATE INDEX idx_sys_transgran_import_logs_good_id ON sys_transgran_import_logs (good_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX idx_lst_barcodes_barcode ON lst_barcodes');
        $this->addSql('DROP INDEX idx_lst_signed_goods_good_id ON lst_signed_goods');
        $this->addSql('DROP INDEX idx_lst_attr_values_good_id ON lst_attr_values');
        $this->addSql('DROP INDEX idx_lst_photos_good_id ON lst_photos');
        $this->addSql('DROP INDEX idx_lst_good_categories_good_id ON lst_good_categories');
        $this->addSql('DROP INDEX idx_sys_publication_logs_good_id ON sys_publication_logs');
        $this->addSql('DROP INDEX idx_sys_edo_pharma_push_logs_good_id ON sys_edo_pharma_push_logs');
        $this->addSql('DROP INDEX idx_sys_transgran_export_logs_good_id ON sys_transgran_export_logs');
        $this->addSql('DROP INDEX idx_sys_transgran_import_logs_good_id ON sys_transgran_import_logs');
    }
}
