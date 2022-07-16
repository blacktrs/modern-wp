<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(
    name: 'term_relationships',
    indexes: [
        new ORM\Index(
            name: 'term_taxonomy_id',
            columns: ['term_taxonomy_id']
        ),
    ]
)]
#[ORM\Entity]
class WpTermRelationships
{
    #[ORM\Column(name: 'object_id', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private string|int $objectId = '0';

    #[ORM\Column(name: 'term_taxonomy_id', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private string|int $termTaxonomyId = '0';

    #[ORM\Column(name: 'term_order', type: 'integer', nullable: false)]
    private string|int $termOrder = '0';

    public function getObjectId(): int|string
    {
        return $this->objectId;
    }

    public function setObjectId(int|string $objectId): void
    {
        $this->objectId = $objectId;
    }

    public function getTermTaxonomyId(): int|string
    {
        return $this->termTaxonomyId;
    }

    public function setTermTaxonomyId(int|string $termTaxonomyId): void
    {
        $this->termTaxonomyId = $termTaxonomyId;
    }

    public function getTermOrder(): int|string
    {
        return $this->termOrder;
    }

    public function setTermOrder(int|string $termOrder): void
    {
        $this->termOrder = $termOrder;
    }
}
