<?php


namespace App\Association\Domain\Aggregate;


class Association
{

    private string $id;
    //private string $municipality;
    private string $postalCode;
    private string $description;


    private function __construct(string $id, string $postalCode, string $description)
    {
        $this->id = $id;
        $this->postalCode = $postalCode;
        $this->description = $description;
    }

    public function getId(): string
    {
        return $this->id;
    }

    /*public function getMunicipality(): string
    {
        return $this->municipality;
    }*/

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public static function registerAssociation(string $id, string $postalCode, string $description): Association
    {
        return new self($id, $postalCode, $description);
    }

}