<?php


namespace App\Person\Domain\Aggregate;

use App\Shared\Domain\Aggregate\AggregateRoot;

class Person extends AggregateRoot
{
    private string $id;
    private string $firstName;
    private string $lastName;
    private string $document;
    private string $phone;

    private function __construct(
        string $id,
        string $firstName,
        string $lastName,
        string $document,
        string $phone,
    )
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->document = $document;
        $this->phone = $phone;
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

    public static function registerPerson(string $id, string $firstName, string $lastName, string $document, string $phone): self
    {
        return new self($id, $firstName, $lastName, $document, $phone);
    }

}