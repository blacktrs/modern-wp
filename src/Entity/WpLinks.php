<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'links', indexes: [new ORM\Index(columns: ['link_visible'], name: 'link_visible')])]
#[ORM\Entity]
class WpLinks
{
    #[ORM\Column(name: 'link_id', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private readonly int $linkId;

    #[ORM\Column(name: 'link_url', type: 'string', length: 255, nullable: false)]
    private string $linkUrl = '';

    #[ORM\Column(name: 'link_name', type: 'string', length: 255, nullable: false)]
    private string $linkName = '';

    #[ORM\Column(name: 'link_image', type: 'string', length: 255, nullable: false)]
    private string $linkImage = '';

    #[ORM\Column(name: 'link_target', type: 'string', length: 25, nullable: false)]
    private string $linkTarget = '';

    #[ORM\Column(name: 'link_description', type: 'string', length: 255, nullable: false)]
    private string $linkDescription = '';

    #[ORM\Column(name: 'link_visible', type: 'string', length: 20, nullable: false, options: ['default' => 'Y'])]
    private string $linkVisible = 'Y';

    #[ORM\Column(name: 'link_owner', type: 'bigint', nullable: false, options: ['default' => 1, 'unsigned' => true])]
    private string|int $linkOwner = '1';

    #[ORM\Column(name: 'link_rating', type: 'integer', nullable: false)]
    private string|int $linkRating = '0';

    #[ORM\Column(name: 'link_updated', type: 'datetime', nullable: false, options: ['default' => '0000-00-00 00:00:00'])]
    private string|\DateTime $linkUpdated = '0000-00-00 00:00:00';

    #[ORM\Column(name: 'link_rel', type: 'string', length: 255, nullable: false)]
    private string $linkRel = '';

    #[ORM\Column(name: 'link_notes', type: 'text', length: 16_777_215, nullable: false)]
    private string $linkNotes;

    #[ORM\Column(name: 'link_rss', type: 'string', length: 255, nullable: false)]
    private string $linkRss = '';

    public function getLinkUrl(): string
    {
        return $this->linkUrl;
    }

    public function setLinkUrl(string $linkUrl): void
    {
        $this->linkUrl = $linkUrl;
    }

    public function getLinkName(): string
    {
        return $this->linkName;
    }

    public function setLinkName(string $linkName): void
    {
        $this->linkName = $linkName;
    }

    public function getLinkImage(): string
    {
        return $this->linkImage;
    }

    public function setLinkImage(string $linkImage): void
    {
        $this->linkImage = $linkImage;
    }

    public function getLinkTarget(): string
    {
        return $this->linkTarget;
    }

    public function setLinkTarget(string $linkTarget): void
    {
        $this->linkTarget = $linkTarget;
    }

    public function getLinkDescription(): string
    {
        return $this->linkDescription;
    }

    public function setLinkDescription(string $linkDescription): void
    {
        $this->linkDescription = $linkDescription;
    }

    public function getLinkVisible(): string
    {
        return $this->linkVisible;
    }

    public function setLinkVisible(string $linkVisible): void
    {
        $this->linkVisible = $linkVisible;
    }

    public function getLinkOwner(): int|string
    {
        return $this->linkOwner;
    }

    public function setLinkOwner(int|string $linkOwner): void
    {
        $this->linkOwner = $linkOwner;
    }

    public function getLinkRating(): int|string
    {
        return $this->linkRating;
    }

    public function setLinkRating(int|string $linkRating): void
    {
        $this->linkRating = $linkRating;
    }

    public function getLinkUpdated(): \DateTime|string
    {
        return $this->linkUpdated;
    }

    public function setLinkUpdated(\DateTime|string $linkUpdated): void
    {
        $this->linkUpdated = $linkUpdated;
    }

    public function getLinkRel(): string
    {
        return $this->linkRel;
    }

    public function setLinkRel(string $linkRel): void
    {
        $this->linkRel = $linkRel;
    }

    public function getLinkRss(): string
    {
        return $this->linkRss;
    }

    public function setLinkRss(string $linkRss): void
    {
        $this->linkRss = $linkRss;
    }

    public function getLinkId(): int
    {
        return $this->linkId;
    }

    public function getLinkNotes(): string
    {
        return $this->linkNotes;
    }

    public function setLinkNotes(string $linkNotes): void
    {
        $this->linkNotes = $linkNotes;
    }
}
