<?php

declare(strict_types=1);

namespace NktMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250418102703 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Добавление индексов';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE INDEX idx_lst_signed_goods_good_id ON lst_signed_goods USING btree (good_id)');
        $this->addSql('CREATE INDEX idx_sys_publication_logs_good_id ON sys_publication_logs USING btree (good_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP INDEX idx_lst_signed_goods_good_id');
        $this->addSql('DROP INDEX idx_sys_publication_logs_good_id');
    }
}
