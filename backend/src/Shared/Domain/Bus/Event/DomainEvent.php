<?php

declare(strict_types=1);

namespace App\Shared\Domain\Bus\Event;

use CodelyTv\Shared\Domain\Utils;
//use CodelyTv\Shared\Domain\ValueObject\Uuid;
use Symfony\Component\Uid\Uuid;
use DateTimeImmutable;

abstract class DomainEvent
{
    private readonly string $eventId;
    private readonly string $occurredOn;

    public function __construct(private readonly string $aggregateId, string $eventId = null, string $occurredOn = null)
    {
        //$this->eventId    = $eventId ?: Uuid::random()->value();
        $this->eventId    = $eventId ?: Uuid::v4()->toRfc4122();
        $this->occurredOn = $occurredOn ?: Utils::dateToString(new DateTimeImmutable());
    }

    abstract public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): self;

    abstract public static function eventName(): string;

    abstract public function toPrimitives(): array;

    public function aggregateId(): string
    {
        return $this->aggregateId;
    }

    public function eventId(): string
    {
        return $this->eventId;
    }

    public function occurredOn(): string
    {
        return $this->occurredOn;
    }
}