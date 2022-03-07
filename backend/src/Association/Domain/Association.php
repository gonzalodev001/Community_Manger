<?php


namespace App\Association\Domain;


class Association
{

    private string $id;
    private string $municipality;
    private string $postalCode;
    private string $description;


    public function __construct(string $id, string $municipality, string $postalCode, string $description)
    {
        $this->id = $id;
        $this->municipality = $municipality;
        $this->postalCode = $postalCode;
        $this->description = $description;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getMunicipality(): string
    {
        return $this->municipality;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public static function registerAssociation(string $id, string $municipality, string $postalCode, string $description): self
    {

    }

}