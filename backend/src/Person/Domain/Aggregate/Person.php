<?php


namespace App\Person\Domain\Aggregate;


use App\Shared\Domain\ValueObject\Uuid;

class Person
{
    //private Uuid $id;
    private string $id;
    private string $firstName;
    private string $lastName;
    private string $document;
    private string $phone;
    //private Uuid $userId;
    private string $userId;

    public function __construct(
        string $id,
        string $firstName,
        string $lastName,
        string $document,
        string $phone,
        string $userId
    )
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->document = $document;
        $this->phone = $phone;
        $this->userId = $userId;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function firstName(): string
    {
        return $this->firstName;
    }

    public function lastName(): string
    {
        return $this->lastName;
    }

    public function document(): string
    {
        return $this->document;
    }

    public function phone(): string
    {
        return $this->phone;
    }

    public function userId(): string
    {
        return $this->userId;
    }

    public static function registerPerson(string $id, string $firstName, string $lastName, string $document, string $phone, string $userId): self
    {
        return new self($id, $firstName, $lastName, $document, $phone, $userId);
    }

}