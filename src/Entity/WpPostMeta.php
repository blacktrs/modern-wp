<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'postmeta', indexes: [
    new ORM\Index(name: 'meta_key', columns: ['meta_key']),
    new ORM\Index(name: 'post_id', columns: ['post_id']),
])]
#[ORM\Entity]
class WpPostMeta
{
    #[ORM\Column(name: 'meta_id', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private readonly int $metaId;

    #[ORM\Column(name: 'post_id', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    private string|int $postId = '0';

    #[ORM\Column(name: 'meta_key', type: 'string', length: 255, nullable: true)]
    private ?string $metaKey = null;

    #[ORM\Column(name: 'meta_value', type: 'text', length: 0, nullable: true)]
    private ?string $metaValue = null;

    public function getPostId(): int|string
    {
        return $this->postId;
    }

    public function setPostId(int|string $postId): void
    {
        $this->postId = $postId;
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
