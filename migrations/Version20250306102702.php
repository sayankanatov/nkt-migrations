<?php

declare(strict_types=1);

namespace NktMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250306102702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Добавление внешних ключей';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lst_signed_goods ADD CONSTRAINT FK_signed_goods_good FOREIGN KEY (good_id) REFERENCES lst_goods (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lst_attr_values ADD CONSTRAINT FK_attr_values_good FOREIGN KEY (good_id) REFERENCES lst_goods (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sys_publication_logs ADD CONSTRAINT FK_publication_logs_good FOREIGN KEY (good_id) REFERENCES lst_goods (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lst_photos ADD CONSTRAINT FK_photos_good FOREIGN KEY (good_id) REFERENCES lst_goods (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lst_good_categories ADD CONSTRAINT FK_good_categories_good FOREIGN KEY (good_id) REFERENCES lst_goods (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sys_edo_pharma_push_logs ADD CONSTRAINT FK_pharma_push_logs_good FOREIGN KEY (good_id) REFERENCES lst_goods (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sys_transgran_export_logs ADD CONSTRAINT FK_transgran_export_logs_good FOREIGN KEY (good_id) REFERENCES lst_goods (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sys_transgran_import_logs ADD CONSTRAINT FK_transgran_import_logs_good FOREIGN KEY (good_id) REFERENCES lst_goods (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lst_signed_goods DROP FOREIGN KEY FK_signed_goods_good');
        $this->addSql('ALTER TABLE lst_attr_values DROP FOREIGN KEY FK_attr_values_good');
        $this->addSql('ALTER TABLE sys_publication_logs DROP FOREIGN KEY FK_publication_logs_good');
        $this->addSql('ALTER TABLE lst_photos DROP FOREIGN KEY FK_photos_good');
        $this->addSql('ALTER TABLE lst_good_categories DROP FOREIGN KEY FK_good_categories_good');
        $this->addSql('ALTER TABLE sys_edo_pharma_push_logs DROP FOREIGN KEY FK_pharma_push_logs_good');
        $this->addSql('ALTER TABLE sys_transgran_export_logs DROP FOREIGN KEY FK_transgran_export_logs_good');
        $this->addSql('ALTER TABLE sys_transgran_import_logs DROP FOREIGN KEY FK_transgran_import_logs_good');
    }
}
