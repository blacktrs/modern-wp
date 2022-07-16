<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(
    name: 'options',
    indexes: [new ORM\Index(columns: ['autoload'], name: 'autoload')],
    uniqueConstraints: [
        new ORM\UniqueConstraint(
            name: 'option_name',
            columns: ['option_name']
        ),
    ]
)]
#[ORM\Entity]
class WpOptions
{
    #[ORM\Column(name: 'option_id', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private readonly int $optionId;

    #[ORM\Column(name: 'option_name', type: 'string', length: 191, nullable: false)]
    private string $optionName = '';

    #[ORM\Column(name: 'option_value', type: 'text', length: 0, nullable: false)]
    private string $optionValue;

    #[ORM\Column(name: 'autoload', type: 'string', length: 20, nullable: false, options: ['default' => 'yes'])]
    private string $autoload = 'yes';

    public function getOptionName(): string
    {
        return $this->optionName;
    }

    public function setOptionName(string $optionName): void
    {
        $this->optionName = $optionName;
    }

    public function getAutoload(): string
    {
        return $this->autoload;
    }

    public function setAutoload(string $autoload): void
    {
        $this->autoload = $autoload;
    }

    public function getOptionId(): int
    {
        return $this->optionId;
    }

    public function getOptionValue(): string
    {
        return $this->optionValue;
    }

    public function setOptionValue(string $optionValue): void
    {
        $this->optionValue = $optionValue;
    }
}
