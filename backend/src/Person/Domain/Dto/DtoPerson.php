<?php


namespace App\Person\Domain\Dto;


class DtoPerson
{
    private string $id;
    private string $firstName;
    private string $lastName;
    private string $document;
    private string $phone;
    private string $userId;

    public function __construct(string $id, string $firstName, string $lastName, string $document, string $phone, string $userId)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->document = $document;
        $this->phone = $phone;
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function firstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function lastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function document(): string
    {
        return $this->document;
    }

    /**
     * @return string
     */
    public function phone(): string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function userId(): string
    {
        return $this->userId;
    }


}