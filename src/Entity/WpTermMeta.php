<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'termmeta', indexes: [
    new ORM\Index(name: 'meta_key', columns: ['meta_key']),
    new ORM\Index(name: 'term_id', columns: ['term_id']),
])]
#[ORM\Entity]
class WpTermMeta
{
    #[ORM\Column(name: 'meta_id', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private readonly int $metaId;

    #[ORM\Column(name: 'term_id', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    private string|int $termId = '0';

    #[ORM\Column(name: 'meta_key', type: 'string', length: 255, nullable: true)]
    private ?string $metaKey = null;

    #[ORM\Column(name: 'meta_value', type: 'text', length: 0, nullable: true)]
    private ?string $metaValue = null;

    public function getTermId(): int|string
    {
        return $this->termId;
    }

    public function setTermId(int|string $termId): void
    {
        $this->termId = $termId;
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

    public function getMetaId(): int
    {
        return $this->metaId;
    }
}
