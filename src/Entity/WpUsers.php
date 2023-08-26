<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Table(name: 'users', indexes: [
    new ORM\Index(columns: ['user_email'], name: 'user_email'),
    new ORM\Index(columns: ['user_login'], name: 'user_login_key'),
    new ORM\Index(columns: ['user_nicename'], name: 'user_nickname'),
])]
#[ORM\Entity]
class WpUsers
{
    #[ORM\Column(name: 'ID', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private readonly int $id;

    #[ORM\Column(name: 'user_login', type: 'string', length: 60, nullable: false)]
    private string $userLogin = '';

    #[ORM\Column(name: 'user_pass', type: 'string', length: 255, nullable: false)]
    private string $userPass = '';

    #[ORM\Column(name: 'user_nicename', type: 'string', length: 50, nullable: false)]
    private string $userNicename = '';

    #[ORM\Column(name: 'user_email', type: 'string', length: 100, nullable: false)]
    private string $userEmail = '';

    #[ORM\Column(name: 'user_url', type: 'string', length: 100, nullable: false)]
    private string $userUrl = '';

    #[ORM\Column(name: 'user_registered', type: 'datetime', nullable: false, options: ['default' => '0000-00-00 00:00:00'])]
    private string|DateTime $userRegistered = '0000-00-00 00:00:00';

    #[ORM\Column(name: 'user_activation_key', type: 'string', length: 255, nullable: false)]
    private string $userActivationKey = '';

    #[ORM\Column(name: 'user_status', type: 'integer', nullable: false)]
    private string|int $userStatus = '0';

    #[ORM\Column(name: 'display_name', type: 'string', length: 250, nullable: false)]
    private string $displayName = '';

    public function getUserLogin(): string
    {
        return $this->userLogin;
    }

    public function setUserLogin(string $userLogin): void
    {
        $this->userLogin = $userLogin;
    }

    public function getUserPass(): string
    {
        return $this->userPass;
    }

    public function setUserPass(string $userPass): void
    {
        $this->userPass = $userPass;
    }

    public function getUserNicename(): string
    {
        return $this->userNicename;
    }

    public function setUserNicename(string $userNicename): void
    {
        $this->userNicename = $userNicename;
    }

    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    public function setUserEmail(string $userEmail): void
    {
        $this->userEmail = $userEmail;
    }

    public function getUserUrl(): string
    {
        return $this->userUrl;
    }

    public function setUserUrl(string $userUrl): void
    {
        $this->userUrl = $userUrl;
    }

    public function getUserRegistered(): DateTime|string
    {
        return $this->userRegistered;
    }

    public function setUserRegistered(DateTime|string $userRegistered): void
    {
        $this->userRegistered = $userRegistered;
    }

    public function getUserActivationKey(): string
    {
        return $this->userActivationKey;
    }

    public function setUserActivationKey(string $userActivationKey): void
    {
        $this->userActivationKey = $userActivationKey;
    }

    public function getUserStatus(): int|string
    {
        return $this->userStatus;
    }

    public function setUserStatus(int|string $userStatus): void
    {
        $this->userStatus = $userStatus;
    }

    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    public function setDisplayName(string $displayName): void
    {
        $this->displayName = $displayName;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
