<?php

declare(strict_types=1);

namespace NktMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260129102801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Изменение к Doctrine формату';
    }

    public function up(Schema $schema): void
    {
        // lst_goods
        $this->addSql('ALTER TABLE lst_goods ALTER COLUMN created_at TYPE TIMESTAMPTZ(0);');
        $this->addSql('ALTER TABLE lst_goods ALTER COLUMN updated_at TYPE TIMESTAMPTZ(0);');
        $this->addSql('ALTER TABLE lst_goods ALTER COLUMN archived_at TYPE TIMESTAMPTZ(0);');
        $this->addSql('ALTER TABLE lst_goods ALTER COLUMN publicated_at TYPE TIMESTAMPTZ(0);');

        // lst_barcodes
        $this->addSql('ALTER TABLE lst_barcodes ALTER COLUMN created_at TYPE TIMESTAMPTZ(0);');
        $this->addSql('ALTER TABLE lst_barcodes ALTER COLUMN updated_at TYPE TIMESTAMPTZ(0);');

        // lst_attr_values
        $this->addSql('ALTER TABLE lst_attr_values ALTER COLUMN created_at TYPE TIMESTAMPTZ(0);');
        $this->addSql('ALTER TABLE lst_attr_values ALTER COLUMN updated_at TYPE TIMESTAMPTZ(0);');

        // lst_photos
        $this->addSql('ALTER TABLE lst_photos ALTER COLUMN created_at TYPE TIMESTAMPTZ(0);');
        $this->addSql('ALTER TABLE lst_photos ALTER COLUMN updated_at TYPE TIMESTAMPTZ(0);');

        // lst_good_categories
        $this->addSql('ALTER TABLE lst_good_categories ALTER COLUMN created_at TYPE TIMESTAMPTZ(0);');
        $this->addSql('ALTER TABLE lst_good_categories ALTER COLUMN updated_at TYPE TIMESTAMPTZ(0);');
    }

    public function down(Schema $schema): void
    {
        // lst_goods
        $this->addSql('ALTER TABLE lst_goods ALTER COLUMN created_at TYPE TIMESTAMPTZ;');
        $this->addSql('ALTER TABLE lst_goods ALTER COLUMN updated_at TYPE TIMESTAMPTZ;');
        $this->addSql('ALTER TABLE lst_goods ALTER COLUMN archived_at TYPE TIMESTAMPTZ;');
        $this->addSql('ALTER TABLE lst_goods ALTER COLUMN publicated_at TYPE TIMESTAMPTZ;');

        // lst_barcodes
        $this->addSql('ALTER TABLE lst_barcodes ALTER COLUMN created_at TYPE TIMESTAMPTZ;');
        $this->addSql('ALTER TABLE lst_barcodes ALTER COLUMN updated_at TYPE TIMESTAMPTZ;');

        // lst_attr_values
        $this->addSql('ALTER TABLE lst_attr_values ALTER COLUMN created_at TYPE TIMESTAMPTZ;');
        $this->addSql('ALTER TABLE lst_attr_values ALTER COLUMN updated_at TYPE TIMESTAMPTZ;');

        // lst_photos
        $this->addSql('ALTER TABLE lst_photos ALTER COLUMN created_at TYPE TIMESTAMPTZ;');
        $this->addSql('ALTER TABLE lst_photos ALTER COLUMN updated_at TYPE TIMESTAMPTZ;');

        // lst_good_categories
        $this->addSql('ALTER TABLE lst_good_categories ALTER COLUMN created_at TYPE TIMESTAMPTZ;');
        $this->addSql('ALTER TABLE lst_good_categories ALTER COLUMN updated_at TYPE TIMESTAMPTZ;');
    }
}