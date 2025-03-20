<?php

namespace NktMigrations\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'migrations:copy-entities',
    description: 'Копирует сущности из библиотеки в src/Entity проекта',
)]
class CopyEntitiesCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $filesystem = new Filesystem();

        // Определяем пути
        $sourceDir = __DIR__ . '/../Entity'; // Путь к сущностям внутри библиотеки
        $targetDir = __DIR__ . '/../../../../src/Entity'; // Путь к сущностям в Symfony проекте

        if (!is_dir($sourceDir)) {
            $io->error('Директория с сущностями не найдена.');
            return Command::FAILURE;
        }

        // Создаем директорию, если её нет
        if (!$filesystem->exists($targetDir)) {
            $filesystem->mkdir($targetDir);
        }

        // Копируем файлы
        foreach (scandir($sourceDir) as $file) {
            if ($file !== '.' && $file !== '..' && str_ends_with($file, '.php')) {
                $filesystem->copy("$sourceDir/$file", "$targetDir/$file", true);
                $io->success("Сущность $file скопирована.");
            }
        }

        return Command::SUCCESS;
    }
}
