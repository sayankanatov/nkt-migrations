# NktMigrations

Библиотека для управления миграциями в проекте с использованием Doctrine Migrations.

## Установка

Установите пакет через Composer:

```sh
composer require sayankanatov/nkt-migrations
```

Добавьте конфигурацию Doctrine Migrations в ```config/packages/doctrine_migrations.php``` запись ```'NktMigrations': '%kernel.project_dir%/vendor/sayankanatov/nkt-migrations/migrations'```

Пример:
```yaml
doctrine_migrations:
    migrations_paths:
        # add this row
        'NktMigrations': '%kernel.project_dir%/vendor/sayankanatov/nkt-migrations/migrations'
```

Чтобы выполнить все доступные миграции, используйте:
```sh
php bin/console doctrine:migrations:migrate
```

