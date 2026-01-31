<?php

declare(strict_types=1);

namespace NktMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260131102202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Создание UNIQUE индекса на barcode в таблицы lst_barcodes';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('DROP INDEX idx_lst_barcodes_barcode');
        $this->addSql('CREATE UNIQUE INDEX idx_lst_barcodes_barcode_unique ON lst_barcodes (barcode)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP INDEX idx_lst_barcodes_barcode_unique');
    }
}