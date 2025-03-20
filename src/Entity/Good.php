<?php

namespace NktMigrations\Entity;

use Doctrine\ORM\Mapping as ORM;
use NktMigrations\Enum\GoodStatus;
use NktMigrations\Enum\PackingPurpose;

#[ORM\Entity]
#[ORM\Table(name: 'lst_goods')]
class Good
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'bigint')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'integer')]
    private int $barcodeId = null;

    #[ORM\Column(type: 'string', length: 20, enumType: GoodStatus::class)]
    private GoodStatus $status;

    #[ORM\Column(type: 'integer')]
    private int $accountId;

    #[ORM\Column(type: 'integer')]
    private int $userId;

    #[ORM\Column(type: 'string', length: 20, enumType: PackingPurpose::class)]
    private PackingPurpose $packingPurpose;

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private bool $isDeleted = false;

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private bool $isValid = false;

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private bool $isVisible = false;

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private bool $isExemplar = false;

    #[ORM\Column(type: 'integer', options: ['default' => 1])]
    private int $versionNumber = 1;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $mainGoodId = null;

    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private \DateTimeImmutable $updatedAt;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private ?\DateTimeImmutable $archivedAt = null;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private ?\DateTimeImmutable $publicatedAt = null;
}
