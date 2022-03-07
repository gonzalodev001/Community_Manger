<?php


namespace App\Community\Domain\Aggregate;


class Community
{
    private string $id;
    private string $address;
    private string $municipality;
    private string $communityTypeId;
    private string $associationId;

    private function __construct(
        string $id,
        string $address,
        string $municipality,
        string $communityTypeId,
        string $associationId
    )
    {
        $this->id = $id;
        $this->address = $address;
        $this->municipality = $municipality;
        $this->communityTypeId = $communityTypeId;
        $this->associationId = $associationId;
    }

    public function getAssociationId(): string
    {
        return $this->associationId;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getMunicipality(): string
    {
        return $this->municipality;
    }

    public function getCommunityTypeId(): string
    {
        return $this->communityTypeId;
    }

    public static function registerCommunity(string $id, string $address, string $municipality, string $communityTypeId, string $associationId): Community
    {
        return new self($id, $address, $municipality, $communityTypeId, $associationId);
    }

}