<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(
    name: 'posts',
    indexes: [
        new ORM\Index(name: 'post_author', columns: ['post_author']),
        new ORM\Index(name: 'post_name', columns: ['post_name']),
        new ORM\Index(name: 'post_parent', columns: ['post_parent']),
        new ORM\Index(name: 'type_status_date', columns: ['post_type', 'post_status', 'post_date', 'ID']),
    ]
)]
#[ORM\Entity]
class WpPosts
{
    #[ORM\Column(name: 'ID', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private readonly int $id;

    #[ORM\Column(name: 'post_author', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    private string|int $postAuthor = '0';

    #[ORM\Column(name: 'post_date', type: 'datetime', nullable: false, options: ['default' => '0000-00-00 00:00:00'])]
    private string|\DateTime $postDate = '0000-00-00 00:00:00';

    #[ORM\Column(name: 'post_date_gmt', type: 'datetime', nullable: false, options: ['default' => '0000-00-00 00:00:00'])]
    private string|\DateTime $postDateGmt = '0000-00-00 00:00:00';

    #[ORM\Column(name: 'post_content', type: 'text', length: 0, nullable: false)]
    private string $postContent;

    #[ORM\Column(name: 'post_title', type: 'text', length: 65535, nullable: false)]
    private string $postTitle;

    #[ORM\Column(name: 'post_excerpt', type: 'text', length: 65535, nullable: false)]
    private string $postExcerpt;

    #[ORM\Column(name: 'post_status', type: 'string', length: 20, nullable: false, options: ['default' => 'publish'])]
    private string $postStatus = 'publish';

    #[ORM\Column(name: 'comment_status', type: 'string', length: 20, nullable: false, options: ['default' => 'open'])]
    private string $commentStatus = 'open';

    #[ORM\Column(name: 'ping_status', type: 'string', length: 20, nullable: false, options: ['default' => 'open'])]
    private string $pingStatus = 'open';

    #[ORM\Column(name: 'post_password', type: 'string', length: 255, nullable: false)]
    private string $postPassword = '';

    #[ORM\Column(name: 'post_name', type: 'string', length: 200, nullable: false)]
    private string $postName = '';

    #[ORM\Column(name: 'to_ping', type: 'text', length: 65535, nullable: false)]
    private string $toPing;

    #[ORM\Column(name: 'pinged', type: 'text', length: 65535, nullable: false)]
    private string $pinged;

    #[ORM\Column(name: 'post_modified', type: 'datetime', nullable: false, options: ['default' => '0000-00-00 00:00:00'])]
    private string|\DateTime $postModified = '0000-00-00 00:00:00';

    #[ORM\Column(name: 'post_modified_gmt', type: 'datetime', nullable: false, options: ['default' => '0000-00-00 00:00:00'])]
    private string|\DateTime $postModifiedGmt = '0000-00-00 00:00:00';

    #[ORM\Column(name: 'post_content_filtered', type: 'text', length: 0, nullable: false)]
    private string $postContentFiltered;

    #[ORM\Column(name: 'post_parent', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    private string|int $postParent = '0';

    #[ORM\Column(name: 'guid', type: 'string', length: 255, nullable: false)]
    private string $guid = '';

    #[ORM\Column(name: 'menu_order', type: 'integer', nullable: false)]
    private string|int $menuOrder = '0';

    #[ORM\Column(name: 'post_type', type: 'string', length: 20, nullable: false, options: ['default' => 'post'])]
    private string $postType = 'post';

    #[ORM\Column(name: 'post_mime_type', type: 'string', length: 100, nullable: false)]
    private string $postMimeType = '';

    #[ORM\Column(name: 'comment_count', type: 'bigint', nullable: false)]
    private string|int $commentCount = '0';

    public function getId(): int
    {
        return $this->id;
    }

    public function getPostAuthor(): int|string
    {
        return $this->postAuthor;
    }

    public function setPostAuthor(int|string $postAuthor): void
    {
        $this->postAuthor = $postAuthor;
    }

    public function getPostDate(): \DateTime|string
    {
        return $this->postDate;
    }

    public function setPostDate(\DateTime|string $postDate): void
    {
        $this->postDate = $postDate;
    }

    public function getPostDateGmt(): \DateTime|string
    {
        return $this->postDateGmt;
    }

    public function setPostDateGmt(\DateTime|string $postDateGmt): void
    {
        $this->postDateGmt = $postDateGmt;
    }

    public function getPostContent(): string
    {
        return $this->postContent;
    }

    public function setPostContent(string $postContent): void
    {
        $this->postContent = $postContent;
    }

    public function getPostTitle(): string
    {
        return $this->postTitle;
    }

    public function setPostTitle(string $postTitle): void
    {
        $this->postTitle = $postTitle;
    }

    public function getPostExcerpt(): string
    {
        return $this->postExcerpt;
    }

    public function setPostExcerpt(string $postExcerpt): void
    {
        $this->postExcerpt = $postExcerpt;
    }

    public function getPostStatus(): string
    {
        return $this->postStatus;
    }

    public function setPostStatus(string $postStatus): void
    {
        $this->postStatus = $postStatus;
    }

    public function getCommentStatus(): string
    {
        return $this->commentStatus;
    }

    public function setCommentStatus(string $commentStatus): void
    {
        $this->commentStatus = $commentStatus;
    }

    public function getPingStatus(): string
    {
        return $this->pingStatus;
    }

    public function setPingStatus(string $pingStatus): void
    {
        $this->pingStatus = $pingStatus;
    }

    public function getPostPassword(): string
    {
        return $this->postPassword;
    }

    public function setPostPassword(string $postPassword): void
    {
        $this->postPassword = $postPassword;
    }

    public function getPostName(): string
    {
        return $this->postName;
    }

    public function setPostName(string $postName): void
    {
        $this->postName = $postName;
    }

    public function getToPing(): string
    {
        return $this->toPing;
    }

    public function setToPing(string $toPing): void
    {
        $this->toPing = $toPing;
    }

    public function getPinged(): string
    {
        return $this->pinged;
    }

    public function setPinged(string $pinged): void
    {
        $this->pinged = $pinged;
    }

    public function getPostModified(): \DateTime|string
    {
        return $this->postModified;
    }

    public function setPostModified(\DateTime|string $postModified): void
    {
        $this->postModified = $postModified;
    }

    public function getPostModifiedGmt(): \DateTime|string
    {
        return $this->postModifiedGmt;
    }

    public function setPostModifiedGmt(\DateTime|string $postModifiedGmt): void
    {
        $this->postModifiedGmt = $postModifiedGmt;
    }

    public function getPostContentFiltered(): string
    {
        return $this->postContentFiltered;
    }

    public function setPostContentFiltered(string $postContentFiltered): void
    {
        $this->postContentFiltered = $postContentFiltered;
    }

    public function getPostParent(): int|string
    {
        return $this->postParent;
    }

    public function setPostParent(int|string $postParent): void
    {
        $this->postParent = $postParent;
    }

    public function getGuid(): string
    {
        return $this->guid;
    }

    public function setGuid(string $guid): void
    {
        $this->guid = $guid;
    }

    public function getMenuOrder(): int|string
    {
        return $this->menuOrder;
    }

    public function setMenuOrder(int|string $menuOrder): void
    {
        $this->menuOrder = $menuOrder;
    }

    public function getPostType(): string
    {
        return $this->postType;
    }

    public function setPostType(string $postType): void
    {
        $this->postType = $postType;
    }

    public function getPostMimeType(): string
    {
        return $this->postMimeType;
    }

    public function setPostMimeType(string $postMimeType): void
    {
        $this->postMimeType = $postMimeType;
    }

    public function getCommentCount(): int|string
    {
        return $this->commentCount;
    }

    public function setCommentCount(int|string $commentCount): void
    {
        $this->commentCount = $commentCount;
    }
}
