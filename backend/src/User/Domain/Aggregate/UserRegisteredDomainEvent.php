<?php

declare(strict_types=1);

namespace App\User\Domain\Aggregate;

use App\Shared\Domain\Bus\Event\DomainEvent;


class UserRegisteredDomainEvent extends DomainEvent
{
    private string $aggregateId;
    private string $email;
    //private Password $password;
    //private DateTime $createdAt;
    //private DateTime $updatedAt;
    //private array $roles;
    private  string $communityId;

    public function __construct(string $aggregateId, string $email, string $communityId, string $eventId = null, string $occurredOn = null)
    {
        $this->email = $email;
        $this->communityId = $communityId;
        parent::__construct($aggregateId, $eventId, $occurredOn);
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