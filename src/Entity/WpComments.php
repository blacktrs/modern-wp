<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'comments', indexes: [
    new ORM\Index(
        columns: ['comment_approved', 'comment_date_gmt'],
        name: 'comment_approved_date_gmt'
    ),
    new ORM\Index(columns: ['comment_author_email'], name: 'comment_author_email'),
    new ORM\Index(columns: ['comment_date_gmt'], name: 'comment_date_gmt'),
    new ORM\Index(columns: ['comment_parent'], name: 'comment_parent'),
    new ORM\Index(columns: ['comment_post_ID'], name: 'comment_post_ID'),
])]
#[ORM\Entity]
class WpComments
{
    #[ORM\Column(name: 'comment_ID', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private readonly int $commentId;

    #[ORM\Column(name: 'comment_post_ID', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    private string|int $commentPostId = '0';

    #[ORM\Column(name: 'comment_author', type: 'text', length: 255, nullable: false)]
    private string $commentAuthor;

    #[ORM\Column(name: 'comment_author_email', type: 'string', length: 100, nullable: false)]
    private string $commentAuthorEmail = '';

    #[ORM\Column(name: 'comment_author_url', type: 'string', length: 200, nullable: false)]
    private string $commentAuthorUrl = '';

    #[ORM\Column(name: 'comment_author_IP', type: 'string', length: 100, nullable: false)]
    private string $commentAuthorIp = '';

    #[ORM\Column(name: 'comment_date', type: 'datetime', nullable: false, options: ['default' => '0000-00-00 00:00:00'])]
    private string|\DateTime $commentDate = '0000-00-00 00:00:00';

    #[ORM\Column(name: 'comment_date_gmt', type: 'datetime', nullable: false, options: ['default' => '0000-00-00 00:00:00'])]
    private string|\DateTime $commentDateGmt = '0000-00-00 00:00:00';

    #[ORM\Column(name: 'comment_content', type: 'text', length: 65535, nullable: false)]
    private string $commentContent;

    #[ORM\Column(name: 'comment_karma', type: 'integer', nullable: false)]
    private string|int $commentKarma = '0';

    #[ORM\Column(name: 'comment_approved', type: 'string', length: 20, nullable: false, options: ['default' => 1])]
    private string $commentApproved = '1';

    #[ORM\Column(name: 'comment_agent', type: 'string', length: 255, nullable: false)]
    private string $commentAgent = '';

    #[ORM\Column(name: 'comment_type', type: 'string', length: 20, nullable: false, options: ['default' => 'comment'])]
    private string $commentType = 'comment';

    #[ORM\Column(name: 'comment_parent', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    private string|int $commentParent = '0';

    #[ORM\Column(name: 'user_id', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    private string|int $userId = '0';

    public function getCommentPostId(): int|string
    {
        return $this->commentPostId;
    }

    public function setCommentPostId(int|string $commentPostId): void
    {
        $this->commentPostId = $commentPostId;
    }

    public function getCommentAuthorEmail(): string
    {
        return $this->commentAuthorEmail;
    }

    public function setCommentAuthorEmail(string $commentAuthorEmail): void
    {
        $this->commentAuthorEmail = $commentAuthorEmail;
    }

    public function getCommentAuthorUrl(): string
    {
        return $this->commentAuthorUrl;
    }

    public function setCommentAuthorUrl(string $commentAuthorUrl): void
    {
        $this->commentAuthorUrl = $commentAuthorUrl;
    }

    public function getCommentAuthorIp(): string
    {
        return $this->commentAuthorIp;
    }

    public function setCommentAuthorIp(string $commentAuthorIp): void
    {
        $this->commentAuthorIp = $commentAuthorIp;
    }

    public function getCommentDate(): \DateTime|string
    {
        return $this->commentDate;
    }

    public function setCommentDate(\DateTime|string $commentDate): void
    {
        $this->commentDate = $commentDate;
    }

    public function getCommentDateGmt(): \DateTime|string
    {
        return $this->commentDateGmt;
    }

    public function setCommentDateGmt(\DateTime|string $commentDateGmt): void
    {
        $this->commentDateGmt = $commentDateGmt;
    }

    public function getCommentKarma(): int|string
    {
        return $this->commentKarma;
    }

    public function setCommentKarma(int|string $commentKarma): void
    {
        $this->commentKarma = $commentKarma;
    }

    public function getCommentApproved(): string
    {
        return $this->commentApproved;
    }

    public function setCommentApproved(string $commentApproved): void
    {
        $this->commentApproved = $commentApproved;
    }

    public function getCommentAgent(): string
    {
        return $this->commentAgent;
    }

    public function setCommentAgent(string $commentAgent): void
    {
        $this->commentAgent = $commentAgent;
    }

    public function getCommentType(): string
    {
        return $this->commentType;
    }

    public function setCommentType(string $commentType): void
    {
        $this->commentType = $commentType;
    }

    public function getCommentParent(): int|string
    {
        return $this->commentParent;
    }

    public function setCommentParent(int|string $commentParent): void
    {
        $this->commentParent = $commentParent;
    }

    public function getUserId(): int|string
    {
        return $this->userId;
    }

    public function setUserId(int|string $userId): void
    {
        $this->userId = $userId;
    }

    public function getCommentId(): int
    {
        return $this->commentId;
    }

    public function getCommentAuthor(): string
    {
        return $this->commentAuthor;
    }

    public function setCommentAuthor(string $commentAuthor): void
    {
        $this->commentAuthor = $commentAuthor;
    }

    public function getCommentContent(): string
    {
        return $this->commentContent;
    }

    public function setCommentContent(string $commentContent): void
    {
        $this->commentContent = $commentContent;
    }
}
