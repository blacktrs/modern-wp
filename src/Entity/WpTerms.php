<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(
    name: 'terms',
    indexes: [
        new ORM\Index(name: 'name', columns: ['name']),
        new ORM\Index(name: 'slug', columns: ['slug']),
    ]
)]
#[ORM\Entity]
class WpTerms
{
    #[ORM\Column(name: 'term_id', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private readonly int $termId;

    #[ORM\Column(name: 'name', type: 'string', length: 200, nullable: false)]
    private string $name = '';

    #[ORM\Column(name: 'slug', type: 'string', length: 200, nullable: false)]
    private string $slug = '';

    #[ORM\Column(name: 'term_group', type: 'bigint', nullable: false)]
    private string|int $termGroup = '0';

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    public function getTermGroup(): int|string
    {
        return $this->termGroup;
    }

    public function setTermGroup(int|string $termGroup): void
    {
        $this->termGroup = $termGroup;
    }

    public function getTermId(): int
    {
        return $this->termId;
    }
}
