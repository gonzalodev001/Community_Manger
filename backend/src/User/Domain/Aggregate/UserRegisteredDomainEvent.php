<?php

declare(strict_types=1);

namespace App\User\Domain\Aggregate;

use App\Shared\Domain\Bus\Event\DomainEvent;
use App\Shared\Domain\ValueObject\Email;
use App\Shared\Domain\ValueObject\Uuid;
use App\User\Domain\ValueObject\Password;

class UserRegisteredDomainEvent extends DomainEvent
{
    private Uuid $id;
    private string $email;
    //private Password $password;
    //private DateTime $createdAt;
    //private DateTime $updatedAt;
    private array $roles;
    private  string $communityId;

    public function __construct(string $id, string $email, string $communityId, string $eventId = null, string $occurredOn = null)
    {
        $this->email = $email;
        $this->communityId = $communityId;
        parent::__construct($id, $eventId, $occurredOn);
    }

    public static function eventName(): string
    {
        return 'user.registered';
    }

    public static function fromPrimitives(string $aggregateId, array $body, string $eventId, string $occurredOn): DomainEvent
    {
        return new self($aggregateId, $body['email'], $body['communityId'], $eventId, $occurredOn);
    }

    public function toPrimitives(): array
    {
        return [
            "aggregate_id" => $this->aggregateId(),
            "id_event" => $this->eventId(),
            "at" => $this->occurredOn(),
            "body" => [
                "email" => $this->email,
                "communityId" => $this->communityId
            ]
        ];
    }
}