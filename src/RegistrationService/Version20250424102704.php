<?php

declare(strict_types=1);

namespace NktMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250424102704 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Добавление внешних ключей';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE lst_attr_values ADD CONSTRAINT FK_attr_values_good FOREIGN KEY (good_id) REFERENCES lst_goods (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lst_photos ADD CONSTRAINT FK_photos_good FOREIGN KEY (good_id) REFERENCES lst_goods (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lst_good_categories ADD CONSTRAINT FK_good_categories_good FOREIGN KEY (good_id) REFERENCES lst_goods (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE lst_attr_values DROP CONSTRAINT FK_attr_values_good');
        $this->addSql('ALTER TABLE lst_photos DROP CONSTRAINT FK_photos_good');
        $this->addSql('ALTER TABLE lst_good_categories DROP CONSTRAINT FK_good_categories_good');
    }
}