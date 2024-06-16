<?php

namespace App\User\Domain\Aggregate;

use App\Shared\Domain\Aggregate\AggregateRoot;
use App\Shared\Domain\ValueObject\Email;
use App\Shared\Domain\ValueObject\Uuid;
use App\User\Domain\Exceptions\InvalidConfirmPassword;
use App\User\Domain\Exceptions\InvalidPasswordUser;
use App\User\Domain\ValueObject\Password;
use DateTime;

class User extends AggregateRoot
{
    private Uuid $id;
    private Email $email;
    private Password $password;
    private DateTime $createdAt;
    private DateTime $updatedAt;
    private array $roles;
    private  Uuid $communityId;

    private function __construct(Uuid $id, Email $email, Password $password, array $roles, Uuid $communityId)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->createdAt = new DateTime();
        $this->roles[] = 'ROLE_USER';
        $this->communityId = $communityId;
        $this->markAsUpdated();
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function email(): Email
    {
        return $this->email;
    }
    public function password(): Password
    {
        return $this->password;
    }

    public function roles(): array
    {
        return $this->roles;
    }

    public function communityId(): Uuid
    {
        return $this->communityId;
    }

    protected function addRole(string $role): array
    {
        $this->roles[] = 'ROLE_'.filter_var($role, FILTER_SANITIZE_STRING);
        return $this->roles();
    }

    public static function registerUser(Uuid $id, Email $email, Password $password, Password $confirmPassword, Uuid $communityId): self
    {
        self::validatePasswords($password, $confirmPassword);

        $user = new self ($id, $email, $password, $communityId);
        
        $user->record(new UserRegisteredDomainEvent($id->value(), $email->email(), $communityId->value()));

        return $user;
    }

    public function Login(string $password): void
    {
        if($this->password->password() !== $password) {
            throw new InvalidPasswordUser();
        }
    }

    public static function validatePasswords(Password $password, Password $confirmPassword): void
    {
        if($password->password() !== $confirmPassword->password()) {
            throw new InvalidConfirmPassword();
        }
    }

    public function markAsUpdated(): void
    {
        $this->updatedAt = new DateTime();
    }

    public static function create(Uuid $id, Email $email, array $roles, Uuid $communityId): self
    {
        $user = new self ($id, $email, new Password(''), $roles, $communityId);
        return $user;
    }
}