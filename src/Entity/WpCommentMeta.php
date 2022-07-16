<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'commentmeta', indexes: [
    new ORM\Index(columns: ['comment_id'], name: 'comment_id'),
    new ORM\Index(columns: ['meta_key'], name: 'meta_key'),
])]
#[ORM\Entity]
class WpCommentMeta
{
    #[ORM\Column(name: 'meta_id', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private readonly int $metaId;

    #[ORM\Column(name: 'comment_id', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    private string|int $commentId = '0';

    #[ORM\Column(name: 'meta_key', type: 'string', length: 255, nullable: true)]
    private ?string $metaKey = null;

    #[ORM\Column(name: 'meta_value', type: 'text', length: 0, nullable: true)]
    private ?string $metaValue = null;

    public function getCommentId(): int|string
    {
        return $this->commentId;
    }

    public function setCommentId(int|string $commentId): void
    {
        $this->commentId = $commentId;
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
