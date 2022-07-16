<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(
    name: 'term_taxonomy',
    uniqueConstraints: [
        new ORM\UniqueConstraint(
            name: 'term_id_taxonomy',
            columns: ['term_id', 'taxonomy']
        ),
    ],
    indexes: [new ORM\Index(name: 'taxonomy', columns: ['taxonomy'])]
)]
#[ORM\Entity]
class WpTermTaxonomy
{
    #[ORM\Column(name: 'term_taxonomy_id', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private readonly int $termTaxonomyId;

    #[ORM\Column(name: 'term_id', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    private string|int $termId = '0';

    #[ORM\Column(name: 'taxonomy', type: 'string', length: 32, nullable: false)]
    private string $taxonomy = '';

    #[ORM\Column(name: 'description', type: 'text', length: 0, nullable: false)]
    private string $description;

    #[ORM\Column(name: 'parent', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    private string|int $parent = '0';

    #[ORM\Column(name: 'count', type: 'bigint', nullable: false)]
    private string|int $count = '0';

    public function getTermId(): int|string
    {
        return $this->termId;
    }

    public function setTermId(int|string $termId): void
    {
        $this->termId = $termId;
    }

    public function getTaxonomy(): string
    {
        return $this->taxonomy;
    }

    public function setTaxonomy(string $taxonomy): void
    {
        $this->taxonomy = $taxonomy;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getParent(): int|string
    {
        return $this->parent;
    }

    public function setParent(int|string $parent): void
    {
        $this->parent = $parent;
    }

    public function getCount(): int|string
    {
        return $this->count;
    }

    public function setCount(int|string $count): void
    {
        $this->count = $count;
    }

    public function getTermTaxonomyId(): int
    {
        return $this->termTaxonomyId;
    }
}
