# NktMigrations

Библиотека для управления миграциями в проекте с использованием Doctrine Migrations.

## Установка

Установите пакет через Composer:

```sh
composer require sayankanatov/nkt-migrations
```

Добавьте конфигурацию Doctrine Migrations в ваш проект:
```php
return [
    'migrations_paths' => [
        'NktMigrations' => 'vendor/sayankanatov/nkt-migrations/migrations',
    ],
];
```

Чтобы выполнить все доступные миграции, используйте:
```sh
vendor/bin/doctrine-migrations migrate
```
