<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'usermeta', indexes: [
    new ORM\Index(name: 'meta_key', columns: ['meta_key']),
    new ORM\Index(name: 'user_id', columns: ['user_id']),
])]
#[ORM\Entity]
class WpUserMeta
{
    #[ORM\Column(name: 'umeta_id', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private readonly int $umetaId;

    #[ORM\Column(name: 'user_id', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    private string|int $userId = '0';

    #[ORM\Column(name: 'meta_key', type: 'string', length: 255, nullable: true)]
    private ?string $metaKey = null;

    #[ORM\Column(name: 'meta_value', type: 'text', length: 0, nullable: true)]
    private ?string $metaValue = null;

    public function getUserId(): int|string
    {
        return $this->userId;
    }

    public function setUserId(int|string $userId): void
    {
        $this->userId = $userId;
    }

    public function getMetaKey(): ?string
    {
        return $this->metaKey;
    }

    public function setMetaKey(?string $metaKey): void
    {
        $this->metaKey = $metaKey;
    }

    public function getMetaValue(): ?string
    {
        return $this->metaValue;
    }

    public function setMetaValue(?string $metaValue): void
    {
        $this->metaValue = $metaValue;
    }

    public function getUmetaId(): int
    {
        return $this->umetaId;
    }
}
