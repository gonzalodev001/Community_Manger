<?php


namespace App\Community\Domain\Aggregate;


class Community
{
    private string $id;
    private string $address;
    private string $municipality;
    private string $communityTypeId;

    private function __construct(
        string $id,
        string $address,
        string $municipality,
        string $communityTypeId
    )
    {
        $this->id = $id;
        $this->address = $address;
        $this->municipality = $municipality;
        $this->communityTypeId = $communityTypeId;
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

    public static function registerCommunity(string $id, string $address, string $municipality, string $communityTypeId): self
    {
        return new self($id, $address, $municipality, $communityTypeId);
    }

}